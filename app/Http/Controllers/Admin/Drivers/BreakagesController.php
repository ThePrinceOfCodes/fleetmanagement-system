<?php

namespace App\Http\Controllers\Admin\Drivers;
use App\Models\Breakages;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class BreakagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
       
    }
    public function new()
    {
        //
        return view('drivers.breakages.new');
    }


    public function records($mobile){
        $breakages_records = DB::table('breakages')->where('mobile','like','%'.$mobile.'%')->paginate(20);
        return view('drivers.breakages.records', compact('breakages_records'));

    }
    //search individuals records
    public function records_search(Request $request)
    {
        $truck_no = $request->get('truck_no');
        $description = $request->get('description');
        $shipment_no = $request->get('shipment_no');
        $shipment_date = $request->get('shipment_date');
        $breakages_cost = $request->get('breakages_cost');
        $mobile = $request->get('mobile');
        
        //
        $breakages_records = DB::table('breakages')
            ->where('mobile',$mobile)
            ->where('truck_no','like','%'.$truck_no.'%')
            ->where('description','like','%'.$description.'%')
            ->where('shipment_no','like','%'.$shipment_no.'%')
            ->where('shipment_date','like','%'.$shipment_date.'%')
            ->where('breakages_cost','like','%'.$breakages_cost.'%')
            ->orderByDesc("id")
            ->paginate(20);
        return view('drivers.breakages.records_search', compact('breakages_records'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Breakages  $breakages
     * @return \Illuminate\Http\Response
     */
    public function show(Breakages $breakages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Breakages  $breakages
     * @return \Illuminate\Http\Response
     */
    public function edit(Breakages $breakages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Breakages  $breakages
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Breakages $breakages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Breakages  $breakages
     * @return \Illuminate\Http\Response
     */
    public function destroy(Breakages $breakages)
    {
        //
    }
}
