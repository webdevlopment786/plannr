<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\API\BaseControllers;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Validator;
use App\Models\User;

class LoginControllers extends BaseControllers
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required',
            'email' => 'required',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        $email = $request->input('email');
        $user = User::where('email', '=', $email)->first();
        if ($user) {
            return response()->json(['status'=>false, 'message' => 'The email has already been taken'], 201);
        }

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $input = $request->all();
        $otp = rand(1000,9999);
        $input['password'] = bcrypt($input['password']);
        $input['otp'] = $otp;

        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')->accessToken;
        $success['first_name'] =  $user->first_name;
        $success['last_name'] =  $user->last_name;
        $success['phone_number'] =  $user->phone_number;
        $success['email'] =  $user->email;
        $success['otp'] =  $user->otp;
        $headers = 'Your OTP';
        $subject = 'Your OTP is :-'.$success['otp'];
        $header = 'Verify This OTP';
        if($user){   
                mail($success['email'], $headers, $subject, $header);     
        //     Mail::send('pages.email.OTPVerificationEmail', ['otp' => $otp], function($message) use($request){
        //         $message->to($request->email);
        //         $message->subject('OTP Received for account verification');
        //   });
         return $this->sendResponse('message', 'OTP Send Check Mail.');
        }
        else{
            return response()->json(["status" => false, 'status' => 'failed']);
       }
    }

    public function otpVerification(Request $request)
    {

        $user  = User::where([['email','=',$request->email],['otp','=',$request->otp]])->first();

        if($user){
            auth()->login($user, true);
            User::where('email','=',$request->email)->update(['otp' => null, 'verify_otp' => '1']);
            $success['token'] = auth()->user()->createToken('authToken')->accessToken;
            $success['first_name'] = $user->first_name; 
            $success['last_name'] = $user->last_name; 
            $success['user_id'] = $user->id; 
            $success['phone_number'] = $user->phone_number; 
            $success['email'] = $user->email; 
            $success['otp'] = $request->otp;
            return response(["status" => true, 'data' => $success]);
        }
        else{
            return response(["status" => false, 'message' => 'Invalid OTP']);
        }
        
    }

    public function login(Request $request)
    {  
        
        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::where('email', '=', $email)->first(); 
        if (!$user) {
            return response()->json(['status'=>false, 'message' => 'The email you entered is invalid. Please make sure you have entered a valid email address and try.'], 201);
        }
        if (!Hash::check($password, $user->password)) {
            return response()->json(['status'=>false, 'message' => 'The Password is incorrect.Please double-check your password and try.'], 201);
        }
        
        if($user->role == 'user') {
            if($user->verify_otp == 1){
                if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
                    $user = Auth::user(); 
                    $success['token'] =  $user->createToken('MyApp')->accessToken; 
                    $success['first_name'] = $user->first_name;
                    $success['user_id'] = $user->id;
                    $success['last_name'] = $user->last_name;
                    $success['phone_number'] = $user->phone_number;
                    $success['email'] = $user->email;
                    $success['otp'] = $user->otp;
                    return response(["status" => true, 'data' => $success]);
                } 
                else{ 
                    return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
                }
            }else{
                return response()->json(['status'=>false, 'message' => 'Please verify your account before logging in.'], 201);
            }
        }
        else{
            return response()->json(['status'=>false, 'message' => 'You are not a member of the system, Please go and register first , then you can proceed for login..'], 201);
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
            $headers = 'Your OTP';
            $subject = 'Your OTP is :-'.$success['otp'];
            $header = 'Verify This OTP';
            mail($user->email, $headers, $subject, $header);

        //     Mail::send('pages.email.OTPVerificationEmail', ['otp' => $otp], function($message) use($request){
        //         $message->to($request->email);
        //         $message->subject('OTP Received for account verification');
        //   });
        
        }else{
            return response()->json(['status'=>false, 'message' => 'Check Mail id is invalid.'], 201);
        }
       
        return $this->sendResponse($success, 'OTP Send Check Mail.');
    }

    public function resendOTP(Request $request)
    {
        $request->validate([
            'email' => 'required',
        ]);

        $user = User::where('email','=',$request->email)->first();
        $otp = rand(1000,9999);
        $user->otp = $otp;
        $user->save();
        $to = $user->email;
        $subject = 'OTP Resent';
        $message = 'Your OTP is: ' . $otp;
        mail($to, $subject, $message);
        //     Mail::send('pages.email.OTPVerificationEmail', ['otp' => $otp], function($message) use($request){
        //         $message->to($request->email);
        //         $message->subject('OTP Received for account verification');
        //   });
        return response()->json(["status" => true, 'message' => 'Resend OTP Send Successfully']);
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
            $headers = 'Your Password is Updated';
            $subject = 'Reset Password :-'.'Your Password is Updated';
            $header = 'Your Password is Updated';
            mail($user['email'], $headers, $subject, $header);
            // Mail::send('pages.email.OTPVerificationEmail123', ['otp' => 'your Password Update'], function($message) use($request){
            //         $message->to($request->email);
            //         $message->subject('OTP Received for account verification');
            //   });

            return $this->sendResponse($user, 'Password Change');
        }else{
            return $this->sendResponse($user, 'Password Not Change Please Password');
        }
    }

    //Google Login
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->stateless()->redirect();
    }

    //Google callback  
    public function handleGoogleCallback()
    {

        $user = Socialite::driver('google')->stateless()->user();
        $this->_registerorLoginUser($user);
        return response()->json($user);
    }

    //Facebook Login
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->stateless()->redirect();
    }
    
    //facebook callback  
    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->stateless()->user();
        $this->_registerorLoginUser($user);
        return response()->json($user);
    }

    protected function _registerOrLoginUser($data)
    {
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

    public function userProfile(Request $request)
    {
        $userId = $request->user_id;
        $user = User::where('id',$userId)->first();

        $imageName = time() . '.' . $request->photo->extension();
        $request->photo->move(public_path('images/userProfile/'), $imageName);

        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->image = $imageName;
        $user->update();

        if($user){
            return response(["status" => true, 'message' => 'User Profile Update Successfully'], 200);
        }else{
            return response(["status" => false, 'data' => 'Not found'], 201);
        }
    }

    public function userProfileView(Request $request)
    {
        
        $userId = $request->user_id;
        $user = User::where('id',$userId)->first();

        if($user->image){
            $imagePath = asset('images/userProfile/'.$user->image);
        }else{
            $imagePath = '';
        }

        $data['image'] = $imagePath; 
        $data['name'] = $user->first_name.' '.$user->last_name; 
        $data['email'] = $user->email;
        Log::info(json_encode($user));
        
        if($data){
            return response(["status" => true, 'data' => $data ], 200);
        }else{
            return response(["status" => false, 'data' => 'Not found'], 201);
        }


    }

    public function userProfileDelete(Request $request)
    {
        $userId = $request->user_id;
        $user = User::where('id',$userId)->first();
        $user->delete();
        Log::info(json_encode($user));
        if($user){
              return response(["status" => true, 'message' => 'Profile Deleted Successfully' ], 200);
        }else{
            return response(["status" => false, 'data' => 'Not found'], 201);
        }

    }
}
