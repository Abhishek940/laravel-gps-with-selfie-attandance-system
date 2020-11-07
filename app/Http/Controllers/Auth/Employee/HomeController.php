<?php

namespace App\Http\Controllers\Auth\Employee;
use App\User;
use App\TimeEntry;
use App\TimeEntryUser;
use App\Services\ReportService;
use Illuminate\Http\Request;
use Auth;
use Carbon;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Input;
class HomeController
{
    public function index()
    {
        return view('auth.employee.dashboard');
    }
		 
	 	public function makeAttandance()
	    {
		return view('auth.employee.make-attandance');
        }
		
		public function changePassword()
		{
			return view ('auth.employee.change-password');
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
		
        //$employee = DB::table('time_entry_users')->where('user_id','=', $id)->get();
        //$employee = DB::table('time_entries')->where('user_id','=', $id)->get();
        //return view('auth.employee.view-attandance',compact('employee'));
		 //return view ('auth.employee.view-attandance')->with('employee',$employee);
		 //$user_id = 1;
		// $employee = DB::table('time_entry_users')
		  //           ->join('time_entries','time_entries.id', '=','time_entry_users.time_entry_id')->select('time_entries.time_start','time_entries.time_end','time_entry_users.location_in')->where('time_entries.user_id', $id)->get();
		   
					  
		//$employee = DB::table('time_entry_users')
		  //     ->join('time_entries', 'time_entries.id', '=', 'time_entry_users.time_entry_id')->select('time_entries.time_start', 'time_entries.time_end', 'time_entry_users.location_in')->get();			  
		   
		    
			
            // $employee = TimeEntry::find(94)->timeEntrieUsers;
            //echo  $emp = $employee->timeEntries->user_id;
			//dd($employee);
			
         $employee = TimeEntryUser::with('timeEntries')->where('user_id','=', $id)->get();
		 return view('auth.employee.view-attandance')->with('employee',$employee);
         }
          
		  
         public function Total(Request $request, ReportService $reportService)
         {
        $employees = TimeEntry::whereHas('user', function ($query) {
                  $query->where('id', auth()->id());
            })
            ->get();
        $dateRange = $reportService->generateDateRange();

        $timeEntries = $reportService->generateReport($request->input('employee'));
		 return view('auth.employees.view-attandance', compact('employees', 'dateRange'));
		 }
         
	   public function location(Request $request)
	   {
		   //Auth::user()->research
		   $timeEntries = TimeEntry::whereHas('user', function ($query) {
                $query->where('id', auth()->id());
            })
            ->first();
			
            //$timeEntries = TimeEntry::find(48);
 
            $user = new TimeEntryUser;
			$user->user_id=$request->input('user_id');
			$timeEntries = $timeEntries->timeEntrieUsers();
            $user->location_in = $request->input('location_in');
			$user->location_out = 'Bihar';
			$user->latlong = $request->input('latlong');
			 //$timeEntries = $timeEntries->timeEntrieUsers()->save($user);
			$timeEntries->save($user);
	   }
	   
	   
	    public function showlocation(Request $request)
	   {
		 
		   $id = Auth::user()->id;
    
           $location = DB::table('time_entry_users')->where('user_id','=', $id)->get();
         
          return view ('auth.employee.show-location')->with('location',$location);
		  
           //return view ('auth.employee.view-attandance')->with('location',$location);
          
	   }
	   
	   

}
