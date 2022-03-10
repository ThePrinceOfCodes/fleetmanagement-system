<?php

namespace App\Http\Controllers\Admin\Drivers;
use App\Models\IOUCurrent;
use App\Models\IOU;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class IOUCurrentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ious = IOUCurrent::orderByDesc("amount")->paginate(20);
        return view('drivers.IOU.index', compact('ious'));
    }

    //search 
    public function search(Request $request)
    {
        $name = $request->get('name');
        $mobile = $request->get('mobile');
        $amount = $request->get('amount');
        
        //
        $ious_current = DB::table('i_o_u_currents')
        ->where('name','like','%'.$name.'%')
        ->where('mobile','like','%'.$mobile.'%')
        ->where('amount','like','%'.$amount.'%')
        ->orderByDesc("amount")
        ->paginate(20);
        return view('drivers.IOU.search', compact('ious_current'));
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function input(Request $request)
    {
        //
        // dd($request);
        $name = $request->get('name');
        $mobile = $request->get('mobile');
        $requested_amount = $request->get('amount');
        $description = $request->get('description');
        $date = $request->get('date');

        $initial_amount_owed =DB::table('i_o_u_currents')
            ->where('mobile',$mobile)
            ->value('amount');

        $currentAmount = $initial_amount_owed + $requested_amount;

        DB::table('i_o_u_currents')
            ->where('mobile',$mobile)
            ->update(['amount' => $currentAmount]);
        // dd($currentAmount);

        $values = array('name' => $name,'mobile' => $mobile,'amount'=> $requested_amount,'description'=> $description,'date'=> $date);
        DB::table('i_o_u_s')->insert($values);

        return redirect()->route('admin.iou.dashboard')->with(['success'=>('file uploaded sucessfully')]);

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\IOUCurrent  $iOUCurrent
     * @return \Illuminate\Http\Response
     */
    public function show(IOUCurrent $iOUCurrent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\IOUCurrent  $iOUCurrent
     * @return \Illuminate\Http\Response
     */
    public function edit(IOUCurrent $iOUCurrent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\IOUCurrent  $iOUCurrent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IOUCurrent $iOUCurrent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IOUCurrent  $iOUCurrent
     * @return \Illuminate\Http\Response
     */
    public function destroy(IOUCurrent $iOUCurrent)
    {
        //
    }
}
