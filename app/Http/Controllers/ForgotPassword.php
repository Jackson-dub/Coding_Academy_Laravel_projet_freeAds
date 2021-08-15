<?php

namespace App\Http\Controllers;

use App\Mail\ForgetPasswordMail;
use App\Models\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
Use Mail;

class ForgotPassword extends Controller
{
    public function getForgetpassword(){

        return view('forget-password.index');

    }

    public function postForgetpassword(Request $request){

        $request->validate([
            'email'=>'required|email'
        ]);

        $user= User::where('email',$request->email)->first();

         if(!$user){

             return redirect()->back()->with('error','User not found.');

         }else{

            $reset_code = Str::random(100);
            PasswordReset::create([
                'email' => $user->email,
                'token'=>$reset_code
            ]);

            Mail::to($user->email)->send(new ForgetPasswordMail($user->nickname,$reset_code));

            return redirect()->back()->with('succes','We have sent you a password reset link. Please check your email.');


         }


    }

    public function getResetPassword($token){

                $password_reset_data = PasswordReset::where('token',$token)->first();

             if(!$password_reset_data){

                 return redirect('/forget_password')->with('error','Invalid password reset link.');

             }else{

                 return view('forget-password.reset_password',compact('token'));
             }

    }

    public function getNewPassword(Request $request,$token){

    

        $password_reset_data = PasswordReset::where('token',$token)->first();

        
        
        if($password_reset_data){

           // dd($request);

             $request->validate([
                 'email'=>'required|email',
                 'password'=>'required|min:8|max:100',
                 'password_confirmation'=>'required|same:password',
             ]);

            $user = User::where('email',$request->email)->first();
         
            if($user->email!=$request->email){
                return redirect()->back()->with('error','Enter correct email.');
            }else{

                PasswordReset::where('token',$token)->delete();
               
                    $user->password = bcrypt($request->password);
                    $user->login = $user->login;
                    $user->email = $user->email;
                    $user->nickname = $user->nickname;
                    $user->phoneNumber = $user->phoneNumber;
                    $user->is_admin = $user->is_admin;
                    $user->update();
                    $user->setPasswordAttribute($request->password);
                
                return redirect('users/signin')->with('succes','Password successfully reset.');
            }

        }else{

            return redirect('/forget_password')->with('error','Invalid password reset link.');

        }
    }
}
