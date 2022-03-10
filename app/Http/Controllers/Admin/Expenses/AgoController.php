<?php

namespace App\Http\Controllers\Admin\Expenses;

use App\Models\Ago;
use App\Imports\AgosImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AgoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $agos = Ago::orderByDesc("id")->paginate(20);
        return view('admin.ago.index',compact('agos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.ago.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        //
        $name = $request->name;
        $mobile = $request->mobile;
        $truck_no = $request->truck_no;
        $shipment_no = $request->shipment_no;
        $destination = $request->destination;
        $date = $request->date;
        $quantity = $request->quantity;
        $rate = $request->rate;
        $total_cost = $rate * $quantity; 
        
        // dd($destination);

        $values = array('name' => $name,'mobile' => $mobile,'truck_no' => $truck_no,'shipment_no'=> $shipment_no,
        'destination'=> $destination,'date'=> $date,'quantity'=> $quantity,
        'rate'=> $rate,'total_cost'=> $total_cost);
        // dd($values);
        DB::table('agos')->insert($values);

        return redirect()->route('admin.ago.dashboard')->with(['success'=>('file uploaded sucessfully')]);

        //dd($total_cost);
    }

    public function import(Request $request)
    {
        //dd($request);

        $validator = Validator::make($request->all(),[
            'file'=> 'required|max:5000|mimes:xls,xlsx,'
        ]);
       
        if($validator->passes()){
            $file = $request->file('file');

            $import = new AgosImport;
            $import->import($file);
            //dd($import->errors());
            return redirect()->back()->with(['success'=>('file uploaded sucessfully')]);
        }else{
            return redirect()->back()->with(['errors'=>$validator->errors()->all()]);
        }
       
    }

    public function search(Request $request)
    {
        //
        $name = $request->name;
       
        $truck_no = $request->truck_no;
        $shipment_no = $request->shipment_no;
        $destination = $request->destination;
        $date = $request->date;
        
        //
        $agos = DB::table('agos')
        ->where('name','like','%'.$name.'%')
        ->where('truck_no','like','%'.$truck_no.'%')
        ->where('shipment_no','like','%'.$shipment_no.'%')
        ->where('date','like','%'.$date.'%')
        ->where('destination','like','%'.$destination.'%')
        ->orderByDesc("id")
        ->paginate(50);
        return view('admin.ago.index', compact('agos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ago  $ago
     * @return \Illuminate\Http\Response
     */
    public function edit(Ago $ago)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ago  $ago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ago $ago)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ago  $ago
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ago $ago)
    {
        //
    }
}
