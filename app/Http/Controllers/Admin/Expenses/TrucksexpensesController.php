<?php

namespace App\Http\Controllers\Admin\Expenses;

use Validator;
use Illuminate\Http\Request;
use App\Models\TrucksExpenses;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\TrucksExpensesImport;

class TrucksexpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return paginated list of all record in truck expenses
        $trucksexpenses = TrucksExpenses::orderByDesc("id")->paginate(20);
        return view('admin.expenses.trucksexpenses.index', compact('trucksexpenses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.expenses.trucksexpenses.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    
    public function import(Request $request)
    {
        //dd($request);

        $validator = Validator::make($request->all(),[
            'file'=> 'required|max:5000|mimes:xls,xlsx,'
        ]);
       
        if($validator->passes()){
            $file = $request->file('file');

            $import = new TrucksExpensesImport;
            $import->import($file);
            //dd($import->errors());
            return redirect()->back()->with(['success'=>('file uploaded sucessfully')]);
        }else{
            return redirect()->back()->with(['errors'=>$validator->errors()->all()]);
        }
       
    }
    //search method for trucksexpenses
    public function search(Request $request)
    {
        $description = $request->get('description');
        $truck_no = $request->get('truck_no');
        $amount = $request->get('amount');
        $date = $request->get('date');
        $location = $request->get('location');
        //
        //dd($request);
        $trucksexpenses = DB::table('trucks_expenses')
        ->where('description','like','%'.$description.'%')
        ->where('truck_no','like','%'.$truck_no.'%')
        ->where('amount','like','%'.$amount.'%')
        ->where('date','like','%'.$date.'%')
        ->where('location','like','%'.$location.'%')
        ->orderByDesc("id")
        ->paginate(50);
        // dd( $trucksexpensessearch[0]->description);
        //dd($trucksexpenses);
        return view('admin.expenses.trucksexpenses.index', compact('trucksexpenses'));
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
        $truck_no = $request->truck_no;
        $description = $request->description;
        $amount = $request->amount;
        $date = $request->date;
        $location = $request->location;

        $truckexpenses = new TrucksExpenses;

        $truckexpenses->truck_no = $truck_no;
        $truckexpenses->description = $description;
        $truckexpenses->amount = $amount;
        $truckexpenses->date = $date;
        $truckexpenses->location = $location;

        $truckexpenses->save();


       
        // dd($destination);

        // $values = array('for' => $for,'description' => $description,'amount' => $amount,'date'=> $date,
        // 'location'=> $location);
        // dd($values);
        // DB::table('agos')->insert($values);

        return redirect()->route('admin.trucksexpenses.dashboard')->with(['success'=>('data uploaded sucessfully')]);

        //dd($total_cost);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
