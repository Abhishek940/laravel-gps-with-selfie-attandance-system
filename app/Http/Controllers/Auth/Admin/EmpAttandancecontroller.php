<?php
namespace App\Http\Controllers\Admin;
use App\Http\Requests\MassDestroyTimeEntryRequest;
use App\Http\Requests\StoreTimeEntryRequest;
use App\Http\Requests\UpdateTimeEntryRequest;
use Illuminate\Http\Request;
use App\EmployeeAttandance;
use App\Employee;
use Gate;
use Illuminate\Http\Request;
class EmpAttandancecontroller extends Controller
{
    
	public function showCurrent()
    {
        $timeEntry =EmployeeAttandance::whereNull('punch_out')
            ->whereHas('employee', function ($query) {
                $query->where('id', auth()->id());
            })
            ->first();

        return response()->json(compact('timeEntry'));
    }

    public function updateCurrent()
    {
        $timeEntry =EmployeeAttandance::whereNull('punch_out')
            ->whereHas('employee', function ($query) {
                $query->where('id', auth()->id());
            })
            ->first();

        if ($timeEntry)
        {
            $timeEntry->update([
                'punch_out' => now()
            ]);

            return response()->json([
                'status' => 'Work time has stopped at [' . gmdate("H:i:s", $timeEntry->total_time) . '] hours'
            ]);
        } else {
            auth()->employee()->timeEntries()->create([
                'punch_in' => now()
            ]);

            return response()->json([
                'status' => 'Work time has started'
            ]);
        };
    }

}
