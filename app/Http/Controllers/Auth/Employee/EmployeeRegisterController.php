<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Staff;
use Illuminate\Support\Facades\Hash;
class StaffRegisterController extends Controller
{
     public function __construct()
    {
        $this->middleware('guest:staff');
    }

    public function showRegisterForm()
    {
        return view('auth.staff-register');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
			 'mobile' => 'required|digits:10',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:staff'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
			'address' => ['required', 'string', 'max:255'],
        ]);

        $request['password'] = Hash::make($request->password);
        Staff::create($request->all());

        return redirect()->intended(route('staff.dashboard'));
    }
}
