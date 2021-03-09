<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckinRequest;
use App\Http\Requests\OccupantStoreRequest;
use App\Imports\OccupantsImport;
use App\Mail\TenantActivation;
use App\Models\Building;
use App\Models\Checkout;
use App\Models\Occupancy;
use App\Models\Occupant;
use App\Models\User;
use App\Notifications\CheckinNotification;
use App\Notifications\TenantCheckinNotification;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class OccupantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
        $tenant = User::wherehas('occupancy')->get();
        $occupants = User::whererole('tenant')->where('status', 1)->where('is_tenant', 1)->latest()->get();
        $total = $occupants->count();
       
        return view('occupants.index', compact('occupants', 'total', 'tenant'));
    }

    public function checkout()
    {
       
        $checkout = Checkout::latest()->get();
      
        return view('occupants.checkout', compact('checkout'));
    }

    public function checkin()
    {
        $buildings = Building::wherestatus(0)->get();
        
        return view('checkin.index', compact('buildings'));
    }
    
    public function checkinTenant($id)
    {
        $facility = Building::findOrFail($id);
        $tenants = User::whererole('tenant')->where('is_tenant', 0)->get();

        return view('checkin.create', compact('tenants', 'facility'));
    }

    public function checkinStore(CheckinRequest $request)
    {
        $checkin = new Occupancy();

        $data = $request->all();;
        // $checkin->create($data);

        // Update Tenant
        // $user = User::whereid($request->tenant_id)
        // ->update(array('is_tenant' => 1, 'status' => 1));

        $tenant = User::findOrFail($request->tenant_id);
        $name = 'Greetings ' .$tenant->name.'!';
        $email = $tenant->email;
        // Update Facility Status
        // $user = Building::whereid($request->building_id)
        // ->update(array('status' => 1, 'tenant_id' => $request->tenant_id));

        $url = route('login');
        $tenants = [
            'greetings' => $name,
            'body' => 'Welcome to Sadara Facility Operation & Maintenance System',
            'actionText' => 'Go to site',
            'actionURL' => url($url),
            'thanks' => 'Please click the button to visit the site',
        ];
        // return $tenants;
        Mail::to($email)->send(new TenantActivation($tenant));
        //    \Notification::send($email, new CheckinNotification($tenants));
        //    \Notification::send('mail', $email)->notify(new TenantCheckinNotification($tenants));
        Alert::toast('Tenant was Checked In successfully!', 'success');

        return redirect('tenants-checkin');
    }

    public function search(Request $request)
    {
        $str = $request->input('search');
        
        $occupants = Occupant::where('badge', 'LIKE', '%'.$str.'%')
        ->orWhere('name', 'LIKE' , '%'.$str.'%')
        ->orWhere('cost_center', 'LIKE' , '%'.$str.'%')
        ->orWhere('email', 'LIKE' , '%'.$str.'%')
        ->orWhere('status_desc', 'LIKE' , '%'.$str.'%')->get();
        
       if($occupants->count() > 0)
       {
            foreach($occupants as $occ)
            {
                $id = $occ->id;
            }
            $occup = Occupancy::whereoccupant_id($id)->get();
       }else{
           $occup = '';
       }

        $total = count($occupants);

        return view('occupants.search', compact('occupants', 'total', 'occup'));
    }


    public function importIndex()
    {
        return view('occupants.import');
    }

    public function import(Request $request)
    {
        $validator = Excel::import(new OccupantsImport,request()->file('file'));
        
        Alert::success('Success', 'Occupants Imported Successfully!');
           
        return back();
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
    public function store(OccupantStoreRequest $request)
    {
        $occupant = Occupant::create($request->all());
        Alert::toast('Occupant was successfully created!', 'success');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Occupant  $occupant
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $occupant = Occupant::findOrFail($id);

        return view('occupants.view', compact('occupant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Occupant  $occupant
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $occupant = Occupant::findOrFail($id);

        return view('occupants.edit', compact('occupant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Occupant  $occupant
     * @return \Illuminate\Http\Response
     */
    public function update(OccupantStoreRequest $request, $id)
    {
        
        $occupant = Occupant::findOrFail($id);
        $occupant->update($request->all());

        Alert::toast('Occupant was successfully updated!', 'success');

        return redirect('/occupants');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Occupant  $occupant
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $occupant = Occupant::findOrFail($id);
        if($occupant->occupancy->count() > 0)
        {
            Alert::error('Failed', 'Sorry, this data has an existing sales record!');
            
            return back();
        }
        $occupant->delete();

        Alert::success('Success', 'Occupant was successfully deleted!');

        return back();
    }
}
