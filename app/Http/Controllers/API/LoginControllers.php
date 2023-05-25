<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\API\BaseControllers as BaseControllers;
use App\Http\Controllers\Controller;
use App\User;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;
use Mail;
use Laravel\Socialite\Facades\Socialite;

class LoginControllers extends BaseControllers
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $input = $request->all();
        $otp = rand(1000,9999);
        $input['password'] = bcrypt($input['password']);
        $input['otp'] = $otp;

        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')->accessToken;
        if($user){        
            Mail::send('pages.email.OTPVerificationEmail', ['otp' => $otp], function($message) use($request){
                $message->to($request->email);
                $message->subject('OTP Received for account verification');
          });
         return $this->sendResponse('Success', 'OTP Send Check Mail.');
        }
        else{
            return response()->json(["status" => false, 'message' => 'failed']);
       }
    }

    public function otpVerification(Request $request){

        $user  = User::where([['email','=',$request->email],['otp','=',$request->otp]])->first();

        if($user){
            auth()->login($user, true);
            User::where('email','=',$request->email)->update(['otp' => null]);
            $success['token'] = auth()->user()->createToken('authToken')->accessToken;
            $success['first_name'] = $user->first_name; 
            $success['last_name'] = $user->last_name; 
            $success['phone_number'] = $user->phone_number; 
            $success['email'] = $user->email; 
            $success['otp'] = $request->otp;
            return response(['data' => $success, "message" => "Success"]);
        }
        else{
            return response(["status" => 401, 'message' => 'Invalid']);
        }
        
    }

    public function login(Request $request)
    {  
        
        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::where('email', '=', $email)->first();
        if (!$user) {
            return response()->json(['success'=>false, 'message' => 'Login Fail, please check email id'], 400);
        }
        if (!Hash::check($password, $user->password)) {
            return response()->json(['success'=>false, 'message' => 'Login Fail, pls check password'], 201);
        }
        
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('MyApp')->accessToken; 
            $success['first_name'] = $user->first_name;
            $success['last_name'] = $user->last_name;
            $success['phone_number'] = $user->phone_number;
            $success['email'] = $user->email;
            $success['otp'] = $user->otp;
            return response(['data' => $success, "message" => "Success",]);
        } 
        else{ 
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        }
    }

    public function forgetPassword(Request $request)
    {
        
        $request->validate([
            'email' => 'required|email',
        ]);
        
        $user = User::where('email','=',$request->email)->first(); 
         
        if($user){
            $otp = rand(1000,9999);
            $user = User::where('email','=',$request->email)->first();
            $user->otp = $otp;
            $user->update();
            $success['otp'] =  $otp;
            Mail::send('pages.email.OTPVerificationEmail', ['otp' => $otp], function($message) use($request){
                $message->to($request->email);
                $message->subject('OTP Received for account verification');
          });
        }else{
            return $this->sendError('Check Mail id is invalid.');
        }
       
        return $this->sendResponse($success, 'OTP Send Check Mail.');
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        $user = User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);
        if($user){
            return $this->sendResponse($user, 'Password Change');
        }else{
            return $this->sendResponse($user, 'Password Not Change Please Password');
        }
    }

    
    //Google Login
    // public function redirectToGoogle()
    // {
    //     return Socialite::driver('google')->stateless()->redirect();
    // }

    public function redirectToProvider($provider)
    {
        // if(!in_array($provider, self::PROVIDERS)){
        //     return $this->sendError(self::NOT_FOUND);       
        // }

        return Socialite::driver('google')->stateless()->redirect();
   
        // return $this->sendResponse($success, "Provider '".$provider."' redirect url.");
    }

    //Google callback  
    // public function handleGoogleCallback(){

    //     $user = Socialite::driver('google')->stateless()->user();
    //     $this->_registerorLoginUser($user);
    //     return 'login Done';
    // }

    public function handleProviderCallback($provider)
    {
        if(!in_array($provider, self::PROVIDERS)){
            return $this->sendError(self::NOT_FOUND);       
        }

        try {
            $providerUser = Socialite::driver($provider)->stateless()->user();
            
            if ($providerUser) {
                $user = $this->findOrCreate($providerUser, $provider);

                $token = $user->createToken(env('API_AUTH_TOKEN_PASSPORT_SOCIAL'))->accessToken; 
       
                return $this->respondWithToken($token);
                //return redirect('https://my-frontend-domain.com/dashboard?access_token='.$token);
            }

        } catch (Exception $exception) {
            return $this->sendError(self::UNAUTHORIZED, null, ['error'=>$e->getMessage()]);
        }        
    }

    //Facebook Login
    public function redirectToFacebook(){
        return Socialite::driver('facebook')->stateless()->redirect();
    }
    
    //facebook callback  
    public function handleFacebookCallback(){
    
    $user = Socialite::driver('facebook')->stateless()->user();
      $this->_registerorLoginUser($user);
      return redirect()->route('home');
    }

    protected function _registerOrLoginUser($data){
        $user = User::where('email',$data->email)->first();
          if(!$user){
             $user = new User();
             $user->first_name = $data->name;
             $user->last_name = $data->name;
             $user->phone_number = $data->name;
             $user->password = $data->name;
             $user->email = $data->email;
             $user->provider_id = $data->id;
             $user->save();
          }
             Auth::login($user);
        }


        public function findOrCreate(ProviderUser $providerUser, string $provider): User
        {
            $linkedSocialAccount = SocialAccount::where('provider_name', $provider)
                ->where('provider_id', $providerUser->getId())
                ->first();
    
            if ($linkedSocialAccount) {
                return $linkedSocialAccount->user;
            } else {
                $user = null;
    
                if ($email = $providerUser->getEmail()) {
                    $user = User::where('email', $email)->first();
                }
    
                if (! $user) {
                    $user = User::create([
                        'name' => $providerUser->getName(),
                        'email' => $providerUser->getEmail(),
                    ]);
                }
    
                $user->linkedSocialAccounts()->create([
                    'provider_id' => $providerUser->getId(),
                    'provider_name' => $provider,
                    'name' => $providerUser->getName(),
                    'email' => $providerUser->getEmail(),
                    'avatar' => $providerUser->getAvatar(),
                    'user_id' => $user->id,
                ]);
    
                return $user;
            }
        }
}
