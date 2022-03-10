<?php

namespace App\Http\Controllers\Admin\Drivers;
use Illuminate\Http\Request;
use App\Models\BreakagesCurrent;
use App\Models\Breakages;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class BreakagesCurrentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $breakages = BreakagesCurrent::orderByDesc("amount")->paginate(20);
        return view('drivers.breakages.index', compact('breakages'));
    }

        //search
    public function search(Request $request)
    {
        $name = $request->get('name');
        $mobile = $request->get('mobile');
        $amount = $request->get('amount');
        
        //
        $breakagesCurrent = DB::table('breakages_currents')
        ->where('name','like','%'.$name.'%')
        ->where('mobile','like','%'.$mobile.'%')
        ->where('amount','like','%'.$amount.'%')
        ->orderByDesc("amount")
        ->paginate(20);
        return view('drivers.breakages.search', compact('breakagesCurrent'));
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
        $truck_no = $request->get('truck_no');
        $description = $request->get('description');
        $shipment_date = $request->get('shipment_date');
        $shipment_no = $request->get('shipment_no');
        $shipment_point = $request->get('shipment_point');
        $breakages = $request->get('breakages');
        $breakages_cost = $request->get('breakages_cost');

        $initial_amount_owed =DB::table('breakages_currents')
            ->where('mobile',$mobile)
            ->value('amount');

           
        $currentAmount = $initial_amount_owed + $breakages_cost;

        DB::table('breakages_currents')
            ->where('mobile',$mobile)
            ->update(['amount' => $currentAmount]);
        // dd($currentAmount);
        
        $values = array('name' => $name,'mobile' => $mobile,'breakages' => $breakages,'shipment_date'=> $shipment_date,
        'description'=> $description,'shipment_no'=> $shipment_no,'shipment_point'=> $shipment_point,
        'breakages'=> $breakages,'breakages_cost'=> $breakages_cost,'truck_no'=>$truck_no);
        // dd($values);
        DB::table('breakages')->insert($values);

        return redirect()->route('admin.breakages.dashboard')->with(['success'=>('file uploaded sucessfully')]);
        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BreakagesCurrent  $breakagesCurrent
     * @return \Illuminate\Http\Response
     */
    public function show(BreakagesCurrent $breakagesCurrent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BreakagesCurrent  $breakagesCurrent
     * @return \Illuminate\Http\Response
     */
    public function edit(BreakagesCurrent $breakagesCurrent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BreakagesCurrent  $breakagesCurrent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BreakagesCurrent $breakagesCurrent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BreakagesCurrent  $breakagesCurrent
     * @return \Illuminate\Http\Response
     */
    public function destroy(BreakagesCurrent $breakagesCurrent)
    {
        //
    }
}
