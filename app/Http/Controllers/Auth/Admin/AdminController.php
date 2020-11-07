<?php
namespace App\Http\Controllers\Auth\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;
use App\User;
use App\TimeEntry;
use App\TimeEntryUser;
use Auth;
use Gate;
use Illuminate\Support\Facades\DB;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('auth.Admin.dashboard');
    }
	
	public function EmpReg()
    {
        return view('auth.Admin.employee-reg');
    }
	
	public function Empregister(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
			'mobile' => 'required|digits:10',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
			'address' => ['required', 'string', 'max:255'],
        ]);

        $request['password'] = Hash::make($request->password);
        User::create($request->all());

 		return redirect()->route('employee.list')->with('success',' Record successfully Inserted !!');
		
   }
   
        public function emplist()
       {
       $user=User::all();
        return view('auth.Admin.employee-list')->with('user', $user);
       }
	
	   public function deleteEmployee($id)
       {
         $employee=User::find($id);
         $employee->delete();
         return redirect()->route('employee.list')->with('success','data successfully deleted !!');
        }
		
         public function editEmployee(Request $request,$id)
          {
          $employee=User::find($id);
          return view('auth.Admin.edit-employee')->with('employee', $employee);
         }
		 
		 public function updateEmployee(Request $request, $id)
         {
            $this->validate($request,[
            'name' => ['string', 'max:255'],
			'mobile' => 'required|digits:10',
            'email' => ['string', 'email', 'max:255'],
            'password' => ['string', 'min:6', 'confirmed'],
			'address' => ['string', 'max:255'],
            ]);
        $employee =User::find($id);
        $employee->name = $request->name;
        $employee->mobile = $request->mobile;
		$employee->email = $request->email;
		$employee->address = $request->address;
        $employee->update();

        return redirect(route('employee.list'))->with('message', 'updated Successfully!!!!');
    }
	
	 
       public function changePassword()
		{
			return view ('auth.Admin.change-password');
		}	

       	public function UpdatePassword(Request $request)
		{
		
		 $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
   
        Admin::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
   
       // dd('Password change successfully.');
	     return redirect(route('admin.change.password'))->with('success', 'password updated Successfully!!!!');
        }
		
           public function forgetPassword()
		   
	       {
			   
		      return view('auth.Admin.forget-password');
	         }
	 

	     public function TotalAttandance(Request $request)
		 
         {
		       
		 $employee = DB::table('users')
                          ->join('time_entries', 'time_entries.user_id', '=', 'users.id')
                          ->select('users.name', 'time_entries.time_start', 'time_entries.time_end','users.id','time_entries.id')
						  ->where('time_entries.deleted_at', NULL)
                          ->get(); 
						//$employee = TimeEntry::withTrashed()->get();  // Restore softdeleted data
                     return view('auth.Admin.view-attandance', compact('employee'));
              
          }
		  
		 public function deleteAttandance($id)
          {
            $attandance=TimeEntry::find($id);
			//$attandance=TimeEntry::find($timeEntrieUsers->id)->delete()
            $attandance->delete();
            return redirect()->route('admin.view-attandance')->with('success','data successfully deleted !!');
          }
		  
		  
           
		  public function Attandancelocation(Request $request)
		 
           {
			     
            $employee = DB::table('users')
                          ->join('time_entry_users','time_entry_users.user_id', '=', 'users.id')
                          ->select('users.name','time_entry_users.location_in','time_entry_users.created_at','time_entry_users.id','time_entry_users.image')
                         ->get();
                     return view('auth.Admin.view-attandance-location', compact('employee'));
              
          }
		  
		  public function deletelocation($id)
          {
            $location=TimeEntryUser::find($id);
            $location->delete();
			
            return redirect()->route('admin.view-attandance-location')->with('success','data successfully deleted !!');
          }
		               		
}