<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\ClientAppointment;
use App\Models\Occupancy;
use App\Models\Occupant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index()
    {
        $greetings = "";
        date_default_timezone_set('Asia/Riyadh');
        
        /* This sets the $time variable to the current hour in the 24 hour clock format */
        $time = date("H");

        /* Set the $timezone variable to become the current timezone */
        $timezone = date("e");

        /* If the time is less than 1200 hours, show good morning */
        if ($time < "12") {
            $greetings = "Good Morning";
        } else

        /* If the time is grater than or equal to 1200 hours, but less than 1700 hours, so good afternoon */
        if ($time >= "12" && $time < "17") {
            $greetings = "Good Afternoon";
        } else

        /* Should the time be between or equal to 1700 and 1900 hours, show good evening */
        if ($time >= "17" && $time < "19") {
            $greetings = "Good Evening";
        } else

        /* Finally, show good night if the time is greater than or equal to 1900 hours */
        if ($time >= "19") {
            $greetings = "Good Night";
        }
        
            // Check if the user password is the default then the will be force to reset pw
        $pw = auth()->user()->password;
        if(Hash::check('Sadara2021', $pw)){
            return redirect(route('reset'));
        }else{

        if(auth()->user()->role == 'tenant')
        {
            $appointments = ClientAppointment::whereuser_id(auth()->user()->id)->get();
            $surveyScores = ClientAppointment::whereuser_id(auth()->user()->id)->where('status', 1)->where('survey_status', 0)->get();
            $openAppointments = ClientAppointment::whereuser_id(auth()->user()->id)->where('status', 0)->get();
            $closedAppointments = ClientAppointment::whereuser_id(auth()->user()->id)->where('status', 1)->get();
            $cancelledAppointments = ClientAppointment::whereuser_id(auth()->user()->id)->where('status', 2)->get();
            // $occupants = User::whereuser_id(auth()->user()->id)->get();
            //     foreach($occupants as $item)
            //     {
            //      return   $badge = $item->id;
            //     }
            $houseInfo = User::findOrFail(auth()->user()->id);
                // foreach($unitInfos as $data)
                // {
                //     $houseInfo = $data;
                // }
            $app_created = $appointments->count();
            $open = $openAppointments->count();
            $closed = $closedAppointments->count();
            $cancelled = $cancelledAppointments->count();
        }else{
            $appointments = ClientAppointment::all()->count();
            $openAppointments = ClientAppointment::where('status', 0)->get();
            $closedAppointments = ClientAppointment::where('status', 1)->get();
            $cancelledAppointments = ClientAppointment::where('status', 2)->get();
            $houseInfo = null;
            $surveyScores = null;
            $open = $openAppointments->count();
            $closed = $closedAppointments->count();
            $cancelled = $cancelledAppointments->count();
            $app_created = $appointments;
        }
    }

        return view('dashboard', compact('houseInfo', 'app_created', 'open', 'closed', 'greetings', 'surveyScores', 'cancelled'));
    }
}
