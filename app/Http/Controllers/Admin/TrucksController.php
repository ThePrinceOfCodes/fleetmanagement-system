<?php

namespace App\Http\Controllers\Admin;
use App\Models\TrucksEvents;
use Illuminate\Http\Request;
use App\Imports\EventsImport;

use App\Models\TrucksDescription;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TrucksController extends Controller
{
    //

    public function index()
    {
        //return paginated list of all record in truck expenses
        $trucksdescription = TrucksDescription::paginate(30);
        return view('admin.trucks.description', compact('trucksdescription'));
    }

    public function detailssearch(Request $request)
    {
        $truck_no = $request->get('truck_no');
        $loading_no = $request->get('loading_no');
        $status = $request->get('status');
        $driver = $request->get('driver');
        $drivers_mobile = $request->get('drivers_mobile');
        //
        $trucksdescription = DB::table('trucks_descriptions')
        ->where('truck_no','like','%'.$truck_no.'%')
        ->where('loading_no','like','%'.$loading_no.'%')
        ->where('status','like','%'.$status.'%')
        ->where('drivers_name','like','%'.$driver.'%')
        ->where('drivers_mobile','like','%'.$drivers_mobile.'%')->paginate(50);
        return view('admin.trucks.description', compact('trucksdescription'));
    }

    public function events()
    {
        //return paginated list of all record in truck expenses
        $trucksevents = TrucksEvents::orderByDesc("id")->paginate(30);
        return view('admin.trucks.events', compact('trucksevents'));
    }

    //view for events upload
    public function eventscreate()
    {
        return view('admin.trucks.create');
    }

    public function eventsimport(Request $request)
    {
        //
        
        $truck_no = $request->truck_no;
        $events = $request->events;
        
        
        // dd($request);

        $truckevent = new TrucksEvents;

        $truckevent->truck_no =  $truck_no;
        $truckevent->events = $events;
        

        $truckevent->save();
        // dd($destination);

        
        return redirect()->route('admin.trucks.events')->with(['success'=>('file uploaded sucessfully')]);

       
    }

    public function eventssearch(Request $request)
    {
        $truck_no = $request->get('truck_no');
        $events = $request->get('events');
        $date = $request->get('date');
        
        //
        $trucksevents = DB::table('trucks_events')
        ->where('truck_no','like','%'.$truck_no.'%')
        ->where('events','like','%'.$events.'%')
        ->where('created_at','like','%'.$date.'%')
        ->paginate(50);
        return view('admin.trucks.events', compact('trucksevents'));
    }

    public function eventsexcel(Request $request)
    {
        //dd($request);

        $validator = Validator::make($request->all(),[
            'file'=> 'required|max:5000|mimes:xls,xlsx,'
        ]);
       
        if($validator->passes()){
            $file = $request->file('file');
            //dd($file);
            $import = new EventsImport;
            $import->import($file);
            //dd($import->errors());
            return redirect()->back()->with(['success'=>('file uploaded sucessfully')]);
        }else{
            return redirect()->back()->with(['errors'=>$validator->errors()->all()]);
        }
       
    }

    public function strip($truck_no){
       // DB::table('trucks_events')->where('mobile','like','%'.$mobile.'%')->paginate(20);
        $trucksevents = new TrucksEvents;
        $trucksevents->truck_no = $truck_no;
        $trucksevents->events = "truck stripped of it driver";
        $trucksevents->save();

        DB::table('trucks_descriptions')
            ->where('truck_no',$truck_no)
            ->update(['drivers_name' => "no driver",'drivers_mobile' => null]);
        return redirect()->back()->with(['success'=>('truck stripped of its driver')]);

    }

    public function changeloading(Request $request,$truck_no){
        //dd($truck_no);
        $loading_no = $request->get('loading_no');

        $trucks = DB::table('trucks_descriptions')
        ->where('truck_no',$loading_no)->get();

        

        if($trucks->count()){
            //changes the loading number of the previous truck to none
            DB::table('trucks_descriptions')
            ->where('loading_no',$loading_no)
            ->update(['loading_no' => 'NONE']);

            //assigns the new loading number
            DB::table('trucks_descriptions')
            ->where('truck_no',$truck_no)
            ->update(['loading_no' => $loading_no]);

            return redirect()->back()->with(['success'=>('loading number changed')]);

        }else{
            return redirect()->back()->with(['errors'=>('truck does not exist on this system')]);
        }
       
    }

    public function changedriver(Request $request,$truck_no){
        $driver_mobile = $request->get('mobile');

        $driver = DB::table('drivers')
        ->where('mobile',$driver_mobile)->get();

        if($driver->count()){

            $drivers_name = DB::table('drivers')
            ->where('mobile', $driver_mobile)
            ->value('name');
            //changes the status of the previous truck to no driver
            DB::table('trucks_descriptions')
            ->where('drivers_mobile',$driver_mobile)
            ->update(['drivers_mobile' => '0','drivers_name' => 'NONE']);

            //assigns the new truck a driver
            DB::table('trucks_descriptions')
            ->where('truck_no',$truck_no)
            ->update(['drivers_mobile' => $driver_mobile,'drivers_name' => $drivers_name]);

            return redirect()->back()->with(['success'=>('Driver Changed')]);

        }else{
            return redirect()->back()->with(['errors'=>('Driver could not be found')]);
        }

    }

    // public function status($truck_no,$status){
    //     // DB::table('trucks_events')->where('mobile','like','%'.$mobile.'%')->paginate(20);
    //      $trucksevents = new TrucksEvents;
    //      $trucksevents->truck_no = $truck_no;
    //      $trucksevents->events = "trucks status changed to {{$status}} ";
    //      $trucksevents->save();
    //      return redirect()->back()->with(['success'=>('trucks status changed to {{$status}}')]);
 
    //  }

}
