<?php

namespace App\Http\Controllers\Auth\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTimeEntryRequest;
use App\Http\Requests\StoreTimeEntryRequest;
use App\Http\Requests\UpdateTimeEntryRequest;
use App\TimeEntry;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TimeEntriesController extends Controller
{
           
    public function showCurrent()
    {
        $timeEntry = TimeEntry::whereNull('time_end')
            ->whereHas('user', function ($query) {
                $query->where('id', auth()->id());
            })
            ->first();

        return response()->json(compact('timeEntry'));
    }

    public function updateCurrent()
    {
        $timeEntry = TimeEntry::whereNull('time_end')
            ->whereHas('user', function ($query) {
                $query->where('id', auth()->id());
            })
            ->first();

        if ($timeEntry)
        {
            $timeEntry->update([
                'time_end' => now()
            ]);

            return response()->json([
                'status' => 'Work time has stopped at [' . gmdate("H:i:s", $timeEntry->total_time) . '] hours'
            ]);
        } else {
            auth()->user()->timeEntries()->create([
                'time_start' => now()
            ]);

            return response()->json([
                'status' => 'Work time has started'
            ]);
        };
    }

    public function showlocation()
    {
        $timeEntry = TimeEntry::whereNull('location_out')
            ->whereHas('user', function ($query) {
                $query->where('id', auth()->id());
            })
            ->first();

        return response()->json(compact('timeEntry'));
    }

    public function updatelocation()
    {
        /*$timeEntry = TimeEntry::whereNull('location_out')
            ->whereHas('user', function ($query) {
                $query->where('id', auth()->id());
            })
            ->first();
			*/
			
		 $timeEntry=new TimeEntry;
		  $timeEntry->location_in = $request->input('location_in');
		  $timeEntry->location_out = $request->input('location_out');
		  
		  
         
        if ($timeEntry)
        {
            $timeEntry->update([
                'location_out' => $timeEntry
            ]);

            return response()->json([
                'status' => 'Work time has stopped at [' . gmdate("H:i:s", $timeEntry->total_time) . '] hours'
            ]);
        } else {
            auth()->user()->timeEntries()->create([
                'location_in' => now()
            ]);

            return response()->json([
                'status' => 'Work location has updated'
            ]);
        };
    }


}
