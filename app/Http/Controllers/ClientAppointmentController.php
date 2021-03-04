<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientAppointmentRequest;
use App\Http\Requests\ClientGetAppointmentRequest;
use App\Models\Appointment;
use App\Models\ClientAppointment;
use App\Models\Occupancy;
use App\Models\Occupant;
use App\Models\Schedule;
use App\Models\WorkCategory;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Intervention\Image\Facades\Image;
use DB;

class ClientAppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments = ClientAppointment::latest()->get();
        
        return view('clients.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = WorkCategory::all();
        return view('clients.get_schedule', compact('categories'));
    }

    public function searchSchedule(ClientGetAppointmentRequest $request)
    {
        $categories = WorkCategory::all();

        $schedules = Schedule::wherework_category_id($request->category)
        ->where('date', $request->date)
        ->get();

       $date = $request->date;
       $categoryId = WorkCategory::whereid($request->category)->get();
       foreach($categoryId as $data)
       {
           $categoryName = $data->name;
           $category_id = $data->id;
       }

    //    return $request->schedule_time;
    //    $appointment= ClientAppointment::whereuser_id(auth()->user()->id)
    //    ->where('date', $request->date)
    //     ->where('work_category_id', $category_id)
    //     ->get();

    //     if($appointment->count() > 0)
    //     {
    //         return $appointment->date;
    //     }

      return view('clients.create', compact('categories', 'schedules', 'date', 'categoryName', 'category_id'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientAppointmentRequest $request)
    {
         
        $data = new ClientAppointment();
        $all_data = $request->all();

        $building_id = Occupant::wherebadge(auth()->user()->badge)->get();
        foreach($building_id as $id)
        {
            $id = $id->id;
        }
        $all_data['occupancy_id'] = $id;

        $appointments = ClientAppointment::whereuser_id($request->user_id)
        ->where('date', $request->date)
        ->where('schedule_time', $request->schedule_time)
        ->where('work_category_id', $request->work_category_id)
        ->get();

        if($appointments->count() > 0)
        {
            Alert::error('Error', 'You cannot book twice for the same appointment');
            return back();

        }else{

        $slots = Schedule::wherework_category_id($request->work_category_id)
        ->where('date', $request->date)
        ->where('time', $request->schedule_time)
        ->get();

        foreach($slots as $slot)
        {
            $avail_slot = $slot->slot;
        }

       $new_slot = $avail_slot - 1;

       $images=array();
       if($files=$request->file('images')){
           foreach($files as $file){

                   // for saving original image
               $ImageUpload = Image::make($file);
               $originalPath = 'uploads/images/';
               $name = $file->hashName();
               $ImageUpload->save($originalPath .$name);
               
               // for saving thumnail image
               $thumbnailPath = 'uploads/thumbnails/';
               $ImageUpload->resize(300,200);
               $ImageUpload = $ImageUpload->save($thumbnailPath .$name);
               
               // for saving to database
               $images[]=$name;
               $all_data['images'] = implode("|",$images);
           }
       }

       if($request->hasfile('documents')){
        $doc = $request->file('documents');
        
        // get the name of the image
        $name = $doc->hashName();
        $doc->move('uploads/documents',$name);
        $all_data['documents'] = $name;
    }
       
      $data->create($all_data);

       $product = Schedule::wherework_category_id($request->work_category_id)
       ->where('date', $request->date)
       ->where('time', $request->schedule_time)
       ->update(array('slot' => $new_slot));
       
       Alert::toast('Transaction was successfully created!', 'success');
    }

       return redirect('client-appointments');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $appointment = ClientAppointment::findOrFail($id);
        $photos = explode('|', $appointment->images);

        return view('clients.view', compact('appointment', 'photos'));
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
        // return $request->all();
        $survey = ClientAppointment::whereid($request->id)
        ->update(array(
            'survey_score' => $request->survey_score,
            'survey_comments' => $request->survey_comments,
            'survey_status' => 1,
        ));

        Alert::toast('Thank you for your feedback!', 'success');

        return redirect('client-appointments');
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
