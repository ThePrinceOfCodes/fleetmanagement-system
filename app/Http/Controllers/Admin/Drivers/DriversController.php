<?php


namespace App\Http\Controllers\Admin\Drivers;

use App\Models\Drivers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DriversController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $drivers= Drivers::orderby('name')->paginate(10);
        //dd($drivers);
        return view('drivers.driversdetails.index', compact('drivers')); 
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
    public function search(Request $request)
    {
        //
        $name = $request->get('name');
        $mobile = $request->get('mobile');
        $licence = $request->get('licence_no');
        $licence_status = $request->get('licence_status');
        
        
        //
        $drivers = DB::table('drivers')
            ->where('name','like','%'.$name.'%')
            ->where('mobile','like','%'.$mobile.'%')
            ->where('licence_no','like','%'.$licence.'%')
            ->where('licence_status','like','%'.$licence_status.'%')
            ->orderBy("name")
            ->paginate(10);
            return view('drivers.driversdetails.index', compact('drivers'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Drivers  $drivers
     * @return \Illuminate\Http\Response
     */
    public function show(Drivers $drivers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Drivers  $drivers
     * @return \Illuminate\Http\Response
     */
    public function edit(Drivers $drivers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Drivers  $drivers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Drivers $drivers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Drivers  $drivers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Drivers $drivers)
    {
        //
    }
}
