<?php

namespace App\Http\Controllers\Admin\Drivers;
use App\Models\IOU;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class IOUController extends Controller
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
        return view('drivers.iou.new');
    }

    //show individual ious
    public function records($mobile){
        $ious_records = DB::table('i_o_u_s')
        ->where('mobile','like','%'.$mobile.'%')
        ->paginate(20);
        return view('drivers.IOU.records', compact('ious_records'));

    }

    //search individuals records
    public function records_search(Request $request)
    {
       
        $description = $request->get('description');
        $amount = $request->get('amount');
        $date = $request->get('date');
        $mobile = $request->get('mobile');
        
        //
        $ious_records = DB::table('i_o_u_s')
            ->where('mobile',$mobile)
            ->where('description','like','%'.$description.'%')
            ->where('amount','like','%'.$amount.'%')
            ->where('date','like','%'.$date.'%')
            ->orderByDesc("id")
            ->paginate(20);
        return view('drivers.IOU.records', compact('ious_records'));
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
     * @param  \App\Models\IOU  $iOU
     * @return \Illuminate\Http\Response
     */
    public function show(IOU $iOU)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\IOU  $iOU
     * @return \Illuminate\Http\Response
     */
    public function edit(IOU $iOU)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\IOU  $iOU
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IOU $iOU)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IOU  $iOU
     * @return \Illuminate\Http\Response
     */
    public function destroy(IOU $iOU)
    {
        //
    }
}
