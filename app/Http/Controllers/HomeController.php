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

            $openjan = ClientAppointment::wherestatus(0)->whereMonth('date', 1)->count();
            $openfeb = ClientAppointment::wherestatus(0)->whereMonth('date', 2)->count();
            $openmar = ClientAppointment::wherestatus(0)->whereMonth('date', 3)->count();
            $openapr = ClientAppointment::wherestatus(0)->whereMonth('date', 4)->count();
            $openmay = ClientAppointment::wherestatus(0)->whereMonth('date', 5)->count();
            $openjune = ClientAppointment::wherestatus(0)->whereMonth('date', 6)->count();
            $openjul = ClientAppointment::wherestatus(0)->whereMonth('date', 7)->count();
            $openaug = ClientAppointment::wherestatus(0)->whereMonth('date', 8)->count();
            $opensep = ClientAppointment::wherestatus(0)->whereMonth('date', 9)->count();
            $openoct = ClientAppointment::wherestatus(0)->whereMonth('date', 10)->count();
            $opennov = ClientAppointment::wherestatus(0)->whereMonth('date', 11)->count();
            $opendec = ClientAppointment::wherestatus(0)->whereMonth('date', 12)->count();
            // return $open[2];

            $closedjan = ClientAppointment::wherestatus(1)->whereMonth('date', 1)->count();
            $closedfeb = ClientAppointment::wherestatus(1)->whereMonth('date', 2)->count();
            $closedmar = ClientAppointment::wherestatus(1)->whereMonth('date', 3)->count();
            $closedapr = ClientAppointment::wherestatus(1)->whereMonth('date', 4)->count();
            $closedmay = ClientAppointment::wherestatus(1)->whereMonth('date', 5)->count();
            $closedjune = ClientAppointment::wherestatus(1)->whereMonth('date', 6)->count();
            $closedjul = ClientAppointment::wherestatus(1)->whereMonth('date', 7)->count();
            $closedaug = ClientAppointment::wherestatus(1)->whereMonth('date', 8)->count();
            $closedsep = ClientAppointment::wherestatus(1)->whereMonth('date', 9)->count();
            $closedoct = ClientAppointment::wherestatus(1)->whereMonth('date', 10)->count();
            $closednov = ClientAppointment::wherestatus(1)->whereMonth('date', 11)->count();
            $closeddec = ClientAppointment::wherestatus(1)->whereMonth('date', 12)->count();

            $canjan = ClientAppointment::wherestatus(2)->whereMonth('date', 1)->count();
            $canfeb = ClientAppointment::wherestatus(2)->whereMonth('date', 2)->count();
            $canmar = ClientAppointment::wherestatus(2)->whereMonth('date', 3)->count();
            $canapr = ClientAppointment::wherestatus(2)->whereMonth('date', 4)->count();
            $canmay = ClientAppointment::wherestatus(2)->whereMonth('date', 5)->count();
            $canjune = ClientAppointment::wherestatus(2)->whereMonth('date', 6)->count();
            $canjul = ClientAppointment::wherestatus(2)->whereMonth('date', 7)->count();
            $canaug = ClientAppointment::wherestatus(2)->whereMonth('date', 8)->count();
            $cansep = ClientAppointment::wherestatus(2)->whereMonth('date', 9)->count();
            $canoct = ClientAppointment::wherestatus(2)->whereMonth('date', 10)->count();
            $cannov = ClientAppointment::wherestatus(2)->whereMonth('date', 11)->count();
            $candec = ClientAppointment::wherestatus(2)->whereMonth('date', 12)->count();

        if(auth()->user()->role == 'tenant')
        {
            $appointments = ClientAppointment::whereuser_id(auth()->user()->id)->get();
            $surveyScores = ClientAppointment::whereuser_id(auth()->user()->id)->where('status', 1)->where('survey_status', 0)->get();
            $openAppointments = ClientAppointment::whereuser_id(auth()->user()->id)->where('status', 0)->get();
            $closedAppointments = ClientAppointment::whereuser_id(auth()->user()->id)->where('status', 1)->get();
            $cancelledAppointments = ClientAppointment::whereuser_id(auth()->user()->id)->where('status', 2)->get();
            $houseInfo = User::findOrFail(auth()->user()->id);
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

        return view('dashboard', compact('houseInfo', 'app_created', 'open', 'closed', 'greetings', 'surveyScores', 'cancelled', 'open', 'closed', 'cancelled',
            'openjan', 'openfeb', 'openmar', 'openapr', 'openmay','openjune','openjul','openaug','opensep','openoct','opennov','opendec',
            'closedjan', 'closedfeb', 'closedmar', 'closedapr', 'closedmay','closedjune','closedjul','closedaug','closedsep','closedoct','closednov','closeddec',
            'canjan', 'canfeb', 'canmar', 'canapr', 'canmay','canjune','canjul','canaug','cansep','canoct','cannov','candec'
            ));
    }
}
