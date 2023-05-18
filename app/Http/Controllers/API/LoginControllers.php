<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\API\BaseControllers as BaseControllers;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Mail;

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
        $success['first_name'] =  $user->first_name;
        $success['last_name'] =  $user->last_name;
        $success['phone_number'] =  $user->phone_number;
        $success['email'] =  $user->email;
        $success['otp'] =  $user->otp;
        if($user){           
            Mail::send('pages.email.OTPVerificationEmail', ['otp' => $otp], function($message) use($request){
                $message->to($request->email);
                $message->subject('OTP Received for account verification');
          });
         return $this->sendResponse($success, 'OTP Send Check Mail.');
        }
        else{
            return response()->json(["status" => false, 'message' => 'failed']);
       }
    }

    public function otpVerification(Request $request){

        $validator = Validator::make($request->all(), [ 
            'otp' => 'required', 
        ]);
        if ($validator->fails()) { 
           return response()->json(['status'=>false,'message'=>$validator->errors()->first()]);             
        }
        $user  = User::where([['otp','=',$request->otp]])->first();
        if($user){
            User::where('email','=',$request->email)->update(['otp' => null,'is_email_verified'=>true]);
            $user_data  = array('id'=>$user->id,'name'=>$user->name,'email'=>$user->email);
            $success['status'] = true;             
            $success['user'] =$user_data;
            $success['message'] = "Your e-mail is verified. You can now login.";
            $message = "Your e-mail is verified. You can now login.";
                 try {
                    $to_address=$user->email;
                    $verification_data=array('email' =>$user->email,
                                             'name' => $user->name);
                    $varifyemail= \Mail::send('emails.registrationEmail', ['verification'=>$verification_data], function($message) use ($to_address) { $message->to($to_address)->subject('Congratulation, on verifying your account'); });
                  
                }
                  catch(Exception $e) {
               }
            return response()->json($success, $this->successStatus);
        }
        else{
             return response()->json(["status" => false, 'message' => 'Invalid OTP']);
        }
    }

    public function login(Request $request)
    {   
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
            $authUser = Auth::user(); 
            dd($authUser);
            $success['token'] =  $authUser->createToken('MyAuthApp')->plainTextToken; 
            $success['name'] =  $authUser->name;
   
            return $this->sendResponse($success, 'User signed in');
        } 
        else{ 
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        } 
    }
}
