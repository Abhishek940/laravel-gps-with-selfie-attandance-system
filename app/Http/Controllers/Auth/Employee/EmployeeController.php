<?php

namespace App\Http\Controllers\Auth\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator,Redirect,Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;
Use App\User;
use App\TimeEntry;
use App\TimeEntryUser;
use App\Services\ReportService;
use Carbon;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
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
		
      $employee = DB::table('time_entries')->where('user_id','=', $id)->where('deleted_at',NULL)->get();
     //$employee = TimeEntryUser::with('timeEntries')->where('user_id','=', $id)->get(); //Fetch relations data//
		 return view('auth.employee.view-attandance')->with('employee',$employee);
         }
            
        
	   public function location(Request $request)
	   {
          $request->validate([
            'location_in' => ['required'],
            'image' => ['required'],
            
        ]);
		   //Auth::user()->research
		   $timeEntries = TimeEntry::whereHas('user', function ($query) {
                $query->where('id', auth()->id());
            })
            ->first();
			
			$image = $request->input('image');	
			
            $user = new TimeEntryUser;
			$user->user_id=$request->input('user_id');
			$timeEntries = $timeEntries->timeEntrieUsers();
            $user->location_in = $request->input('location_in');
			$user->location_out = 'Bihar';
			$user->latlong = $request->input('latlong');
			  
			$folderPath = "uploads/";
  
            $image_parts = explode(";base64,", $image);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
  
            $image_base64 = base64_decode($image_parts[1]);
            $fileName = uniqid() . '.png';
  
            $file = $folderPath . $fileName;
            file_put_contents($file, $image_base64);
			$user->image = $folderPath . $fileName;
            		
			 //$timeEntries = $timeEntries->timeEntrieUsers()->save($user);
			$timeEntries->save($user);
			return redirect()->route('employee.view-attandance')->with('success',' successfully Inserted.');
	   }
	   
	   
	    public function showlocation(Request $request)
	   {
		 
		   $id = Auth::user()->id;
    
           $location = DB::table('time_entry_users')->where('user_id','=', $id)->get();
           return view ('auth.employee.show-location')->with('location',$location);
		                
	   }
	   
	   
    
   

}
