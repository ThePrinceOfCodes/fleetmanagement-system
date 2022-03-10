<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Models\TripAllowance;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller; 
use App\Imports\TripsAllowanceImport;
use Illuminate\Support\Facades\Validator;


class TripAllowanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $trip_allowances = TripAllowance::orderByDesc("id")->paginate(20);
        return view('admin.tripsallowance.index',compact('trip_allowances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.tripsallowance.create');
    }

    public function add(Request $request)
    {
        //
        
        $truck_no = $request->truck_no;
        $shipment_no = $request->shipment_no;
        $start_location = $request->start_location;
        $end_location = $request->end_location;
        $date = $request->date;
        $amount = $request->amount;
        
        
        
        // dd($destination);

        $values = array('truck_no' => $truck_no,'shipment_no'=> $shipment_no,
        'start_location'=> $start_location,'end_location'=> $end_location,'date'=> $date,'amount'=> $amount,
        );
        // dd($values);
        DB::table('trip_allowances')->insert($values);

        return redirect()->route('admin.tripsallowance.dashboard')->with(['success'=>('file uploaded sucessfully')]);


       
    }

    public function search(Request $request)
    {
        //
        $truck_no = $request->truck_no;
        $shipment_no = $request->shipment_no;
        $start_location = $request->start_location;
        $end_location = $request->end_location;
        $date = $request->date;
        $amount = $request->amount;
        
        //
        $trip_allowances = DB::table('trip_allowances')
        ->where('truck_no','like','%'.$truck_no.'%')
        ->where('shipment_no','like','%'.$shipment_no.'%')
        ->where('date','like','%'.$date.'%')
        ->where('end_location','like','%'.$end_location.'%')
        ->orderByDesc("id")
        ->paginate(50);
        return view('admin.tripsallowance.index', compact('trip_allowances'));
    }

    public function import(Request $request)
    {
        //dd($request);

        $validator = Validator::make($request->all(),[
            'file'=> 'required|max:5000|mimes:xls,xlsx,'
        ]);
       
        if($validator->passes()){
            $file = $request->file('file');

            $import = new TripsAllowanceImport;
            $import->import($file);
            //dd($import->errors());
            return redirect()->back()->with(['success'=>('file uploaded sucessfully')]);
        }else{
            return redirect()->back()->with(['errors'=>$validator->errors()->all()]);
        }
       
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
     * @param  \App\Models\TripAllowance  $tripAllowance
     * @return \Illuminate\Http\Response
     */
    public function show(TripAllowance $tripAllowance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TripAllowance  $tripAllowance
     * @return \Illuminate\Http\Response
     */
    public function edit(TripAllowance $tripAllowance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TripAllowance  $tripAllowance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TripAllowance $tripAllowance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TripAllowance  $tripAllowance
     * @return \Illuminate\Http\Response
     */
    public function destroy(TripAllowance $tripAllowance)
    {
        //
    }
}
