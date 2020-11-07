<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Admin;
use Auth;
use Password;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
class AdminForgotPasswordController extends Controller
{
	
	use SendsPasswordResetEmails;
	
     public function __construct()
    {
        $this->middleware('guest:admin');
    }

    /**
     * Show the reset email form.
     * 
     * @return \Illuminate\Http\Response
     */
    public function showLinkRequestForm(){
        return view('auth.passwords.email',[
            'title' => 'Admin Password Reset',
            'passwordEmailRoute' => 'password.email'
        ]);
    }

       public function forgetPassword()
	    {
		 return view('auth.Admin.forget-password');
	    }
    /**
     * password broker for admin guard.
     * 
     * @return \Illuminate\Contracts\Auth\PasswordBroker
     */
    public function broker(){
        return Password::broker('admins');
    }

    /**
     * Get the guard to be used during authentication
     * after password reset.
     * 
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    public function guard(){
        return Auth::guard('admin');
    }
	
	/*	public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);
		


        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $response = $this->broker()->sendResetLink(
            $request->only('email')
        );

        return $response == Password::RESET_LINK_SENT
            ? $this->sendResetLinkResponse($response)
            : $this->sendResetLinkFailedResponse($request, $response);
    }
	*/
}
