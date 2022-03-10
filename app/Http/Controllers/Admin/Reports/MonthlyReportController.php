<?php

namespace App\Http\Controllers\Admin\Reports;

use App\Models\Ago;
use App\Models\Income;
use Illuminate\Http\Request;
use App\Models\AdminExpenses;
use App\Models\MonthlyReport;
use App\Models\TripAllowance;
use App\Models\TrucksExpenses;
use Illuminate\Support\Facades\DB;
use App\Exports\MonthlyReportExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class MonthlyReportController extends Controller
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
    public function monthly(Request $request)
    {
    //     $tests=[30620828,30619035,30619287,30621200,30582455,30589640,30584770,30583812,30585609,30574130,30585609,30581763,30583813,30589230,30589227,30575353,30581274,30588862,30556025,30581618,30583799,30588964,30591290,30592307,30591988,30572165,30588300,30594219,30595237,30594263,30593422,30592145,30590932,30596270,30597434,30596697,30595322,30613446,30617298,30619001,30617887,30617580,30616981,30616258,30612927,3061366,330608895,30609596,30612927,30607323,30611201,30610718,30608957,30610306,30609546,30609544,30607700,30578879,30608957,30605969,30607757,30607365,30606948,30606007,30595322,30605872,30604782,30605342,30603160,30583799,30595486,30597182,30595237,30601431,30595360];
    //     $test1 = [];
    //    dd($tests);
    //     foreach($tests as $test){
    //         $test2 = Income::where('shipment_no',$test)->get();
    //         if(!($test2->count())){
    //             array_push($test1,$test);
    //         }
    //     }
    //     dd($test1);
        //
        $start_date=$request->StartDate;
        $end_date=$request->EndDate;
        $trucks_with_income_above_300000=0;
       
        // dd($request->EndDate);
        $trucks_income =Income::groupBy('truck_no')
        ->selectRaw('sum(frieght_cost) as total, truck_no')
        ->whereBetween('date',[$start_date,$end_date])
        ->pluck('total','truck_no');
        //dd($trucks_income);
       

        $monthlyReports =Ago::groupBy('truck_no')
                                ->selectRaw('sum(total_cost) as total, truck_no')
                                ->whereBetween('date',[$start_date,$end_date])
                                ->pluck('total','truck_no');
        $report = [];
        
        
        if($trucks_income->count()){ 
            
            foreach($trucks_income as $key=>$value){
               if($value>299999){
                    $trucks_with_income_above_300000 = $trucks_with_income_above_300000 + 1;
               }
            } 
            
        }else{
           
            return redirect()->back()->with(['errors'=>('NO TRUCK WORKED WITHIN THE TIME FRAME GIVEN')]);
           
        }
         
        
        foreach($trucks_income as $key=>$value){
            $overhead = 0;
            $trucksExpenses = TrucksExpenses::where('truck_no', $key)->whereBetween('date',[$start_date,$end_date])->sum('amount');
            $trip_count = (DB::table('incomes')->where('truck_no', $key)->whereBetween('date',[$start_date,$end_date])->get())->count();
            $waiver = ((DB::table('incomes')->where('truck_no', $key)->whereBetween('date',[$start_date,$end_date])->get())->count())*6600;
            $ago = Ago::where('truck_no', $key)->whereBetween('date',[$start_date,$end_date])->sum('total_cost');
            $trip_allowance = TripAllowance::where('truck_no', $key)->whereBetween('date',[$start_date,$end_date])->sum('amount');
            $tax = Income::where('truck_no', $key)->whereBetween('date',[$start_date,$end_date])->sum('tax');
            $frieght_cost = Income::where('truck_no', $key)->whereBetween('date',[$start_date,$end_date])->sum('frieght_cost');
            if($frieght_cost > 299999){
                $overhead = (AdminExpenses::whereBetween('date',[$start_date,$end_date])->sum('amount'))/$trucks_with_income_above_300000;
            }else{
                $overhead = 0;
            }
            $report[]=[
                'truck_no'=> $key,
                'trucks expenses'=> $trucksExpenses,
                'trip_count'=>$trip_count,               
                'waiver'=> $waiver,
                'overhead'=>$overhead,
                'ago'=>$ago,
                'trip_allowance'=>$trip_allowance,
                'tax'=>$tax,
                'frieght_cost'=> $frieght_cost,
                'income'=> ($frieght_cost + $waiver) - ($tax + $ago + $trip_allowance + $trucksExpenses + $overhead ),
                     

            ];
            $overhead = 0;
        }

        //excel generator

        return Excel::download(new MonthlyReportExport($report), 'report.xlsx');

        //dd($report);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MonthlyReport  $monthlyReport
     * @return \Illuminate\Http\Response
     */
    public function show(MonthlyReport $monthlyReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MonthlyReport  $monthlyReport
     * @return \Illuminate\Http\Response
     */
    public function edit(MonthlyReport $monthlyReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MonthlyReport  $monthlyReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MonthlyReport $monthlyReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MonthlyReport  $monthlyReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(MonthlyReport $monthlyReport)
    {
        //
    }
}
