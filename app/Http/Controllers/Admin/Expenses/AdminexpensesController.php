<?php


namespace App\Http\Controllers\Admin\Expenses;

use Illuminate\Http\Request;
use App\Models\AdminExpenses;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Imports\AdminExpensesImport;
use Illuminate\Support\Facades\Validator;

class AdminexpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $adminexpenses = AdminExpenses::orderByDesc("id")->paginate(10);
        return view('admin.expenses.adminexpenses.index', compact('adminexpenses'));
    }

        //search
    public function search(Request $request)
    {
        $description = $request->get('description');
        $for = $request->get('for');
        $amount = $request->get('amount');
        $date = $request->get('date');
        $location = $request->get('location');
        //
        $adminexpenses = DB::table('admin_expenses')
        ->where('description','like','%'.$description.'%')
        ->where('for','like','%'.$for.'%')
        ->where('amount','like','%'.$amount.'%')
        ->where('date','like','%'.$date.'%')
        ->where('location','like','%'.$location.'%')
        ->orderByDesc("date")
        ->paginate(50);
        return view('admin.expenses.adminexpenses.index', compact('adminexpenses'));
    }

    public function import(Request $request)
    {
        //dd($request);

        $validator = Validator::make($request->all(),[
            'file'=> 'required|max:5000|mimes:xls,xlsx,'
        ]);
       
        if($validator->passes()){
            $file = $request->file('file');

            $import = new AdminExpensesImport;
            $import->import($file);
            //dd($import->errors());
            return redirect()->back()->with(['success'=>('file uploaded sucessfully')]);
        }else{
            return redirect()->back()->with(['errors'=>$validator->errors()->all()]);
        }
       
    }

    public function create()
    {
        //
        return view('admin.expenses.adminexpenses.create');
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
        $for = $request->for;
        $description = $request->description;
        $amount = $request->amount;
        $date = $request->date;
        $location = $request->location;

        $adminexpenses = new AdminExpenses;

        $adminexpenses->for = $for;
        $adminexpenses->description = $description;
        $adminexpenses->amount = $amount;
        $adminexpenses->date = $date;
        $adminexpenses->location = $location;

        $adminexpenses->save();


       
        // dd($destination);

        // $values = array('for' => $for,'description' => $description,'amount' => $amount,'date'=> $date,
        // 'location'=> $location);
        // dd($values);
        // DB::table('agos')->insert($values);

        return redirect()->route('admin.adminexpenses.dashboard')->with(['success'=>('data uploaded sucessfully')]);

        //dd($total_cost);
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
     * @param  \App\Models\AdminExpenses  $adminExpenses
     * @return \Illuminate\Http\Response
     */
    public function show(AdminExpenses $adminExpenses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminExpenses  $adminExpenses
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminExpenses $adminExpenses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminExpenses  $adminExpenses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdminExpenses $adminExpenses)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdminExpenses  $adminExpenses
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdminExpenses $adminExpenses)
    {
        //
    }
}
