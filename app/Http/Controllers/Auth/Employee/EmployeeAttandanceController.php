<?php
namespace App\Http\Controllers\Users\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Employee;
use App\EmpAttandance;
use Charts;
class EmployeeAttandanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
    }
    public function showCurrent()
    {
        $timeEntry = EmpAttandance::whereNull('time_end')
            ->whereHas('user', function ($query) {
                $query->where('id', auth()->id());
            })
            ->first();

        return response()->json(compact('timeEntry'));
    }

    public function updateCurrent()
    {
        $timeEntry = EmpAttandance::whereNull('time_end')
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
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

     
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}