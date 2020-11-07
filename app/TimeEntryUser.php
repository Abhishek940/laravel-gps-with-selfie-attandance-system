<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class TimeEntryUser extends Model
{
    public $table = 'time_entry_users';

     protected $primaryKey = 'id';

     
	 //public $timestamps = false;
        protected $dates = [
        'time_end',
        'time_start',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
     protected $fillable = [
        'user_id',
        'time_entry_id',
        'location_in',
		'location_out',
		'latlong',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
	
	public function timeEntries()
    {
        return $this->belongsTo(TimeEntry::class);
    }
	

}
