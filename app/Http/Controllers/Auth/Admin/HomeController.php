<?php

namespace App\Http\Controllers\Employee;
use App\User;
use App\TimeEntry;
use Illuminate\Http\Request;
use App\Services\ReportService;
use Auth;
use Carbon;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use DB;
class HomeController
{
    public function index()
    {
        return view('auth.admin.dashboard');
    }
		  public function showLoginForm()
      {
        return view('employee.logins');
      }
	 	public function makeAttandance()
	    {
		return view('employee.make-attandance');
        }
		
		public function changePassword()
		{
			return view ('auth.Employee.change-password');
		}	

	  public function UpdatePassword(Request $request)
		{
		
		 $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
   
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
   
       // dd('Password change successfully.');
	     return redirect(route('employee.change.password'))->with('success', 'password updated Successfully!!!!');
    }
	
      public function TotalAttandance()
      {
        $id = Auth::user()->id;
    
       $employee = DB::table('time_entries')->where('user_id','=', $id)->get();
       if(count ($employee)>0){

       return view('employee.view-attandance',compact('employee'));
         }
          else
         {
        return view('employee.view-attandance');
         }
       }
	   public function TotalAttandances(Request $request)
       {

		$employee = TimeEntry::with('user')->get();
		//$employee=TimeEntry::join('users','users.id','=','time_entries.user_id')
		  //       ->select('time_entries.time_start','time_entries.time_end', 'users.name')->get();

	    return view('employee.view-attandance')->with('employee', $employee);
       }

}
