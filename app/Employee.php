<?php
namespace App;
use Carbon\Carbon;
use Hash;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Employee extends Authenticatable
{
        use Notifiable;

        protected $guard = 'employee';
		
		protected $table='employees';

        protected $fillable = [
            'name','mobile', 'email', 'password','address',
        ];

        protected $hidden = [
            'password', 'remember_token',
        ];
		
		 public function sendPasswordResetNotification($token)
         {
          $this->notify(new EmployeeorgetPasswordNotification($token));
         }
		 
	 
          public function attandance()
          {
         return $this->hasMany(Attandance::class);
        }
}
