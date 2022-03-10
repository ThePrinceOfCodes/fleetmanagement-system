<?php

namespace App\Http\Controllers\Admin;

use App\Models\Income;
use Illuminate\Http\Request;
use App\Imports\IncomesImport;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $incomes = Income::paginate(20);
        return view('admin.income.index',compact('incomes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.income.create');
    }

    public function add(Request $request)
    {
        //
        
        $truck_no = $request->truck_no;
        $shipment_no = $request->shipment_no;
        $destination = $request->destination;
        $date = $request->date;
        $frieght_cost = $request->frieght_cost;
        $tax = (7.5/100)*$frieght_cost;
        
        
        // dd($destination);

        $values = array('truck_no' => $truck_no,'shipment_no'=> $shipment_no,
        'destination'=> $destination,'date'=> $date,'frieght_cost'=> $frieght_cost,'tax'=>$tax,
        );
        // dd($values);
        DB::table('incomes')->insert($values);

        return redirect()->route('admin.income.dashboard');

       
    }

    public function search(Request $request)
    {
        //
        $truck_no = $request->truck_no;
        $shipment_no = $request->shipment_no;
        $destination = $request->destination;
        $date = $request->date;
        $frieght_cost = $request->frieght_cost;
        
        //
        $incomes = DB::table('incomes')
        ->where('frieght_cost','like','%'.$frieght_cost.'%')
        ->where('truck_no','like','%'.$truck_no.'%')
        ->where('shipment_no','like','%'.$shipment_no.'%')
        ->where('date','like','%'.$date.'%')
        ->where('destination','like','%'.$destination.'%')
        ->orderByDesc("id")
        ->paginate(50);
        return view('admin.income.index', compact('incomes'));
    }

    public function import(Request $request)
    {
        //dd($request);

        $validator = Validator::make($request->all(),[
            'file'=> 'required|max:5000|mimes:xls,xlsx,'
        ]);
       
        if($validator->passes()){
            $file = $request->file('file');

            $import = new IncomesImport;
            $import->import($file);
            //dd($import->errors());
            return redirect()->back()->with(['success'=>('file uploaded sucessfully')]);
        }else{
            return redirect()->back()->with(['errors'=>$validator->errors()->all()]);
        }
       
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function show(Income $income)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function edit(Income $income)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Income $income)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function destroy(Income $income)
    {
        //
    }
}
