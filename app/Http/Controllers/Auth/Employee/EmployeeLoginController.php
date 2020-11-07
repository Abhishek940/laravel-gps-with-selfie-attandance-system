<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Session;
class EmployeeLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:employee')->except('logout');
    }

    public function showLoginForm()
    {
        return view('Employee.login');
    }
	
	public function logins(Request $request) {
        if (Auth::attempt ( array (
                'email' => $request->get ( 'email' ),
                'password' => $request->get ( 'password' ) 
        ) )) {
            session ( [ 
                    'name' => $request->get ( 'email' ) 
            ] );
           return redirect()->intended(route('employee.dashboard'));
        } else {
            Session::flash ( 'message', "Invalid Credentials , Please try again." );
             return redirect()->intended(route('employee.login'));
        }
    }

    public function login(Request $request)
    {
        // Validate form data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Attempt to log the user in
        if(Auth::guard('employee')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember))
        {
            return redirect()->intended(route('employee.dashboard'));
        }

        // if unsuccessful
        return redirect()->back()->withInput($request->only('email','remember'));
    }
	
			public function logout()
            {
              Auth::guard('employee')->logout();
             return redirect('/employee');
            }
		
}
