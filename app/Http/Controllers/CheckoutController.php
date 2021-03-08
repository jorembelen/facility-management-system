<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use App\Models\Building;
use App\Models\Checkout;
use App\Models\Occupancy;
use App\Models\User;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkoutView($id)
    {

        $tenant = User::findOrFail($id);

       return view('checkout.index', compact('tenant'));
    }

    public function checkOut(CheckoutRequest $request)
    {
        $data = $request->all();
        $checkout = new Checkout();
        $checkout->create($data);

        $user = User::whereid($request->tenant_id)
        ->update(array('status' => 0, 'is_tenant' => 0));
        
        $user = Building::whereid($request->building_id)
        ->update(array('status' => 0, 'tenant_id' => null));

        return redirect('occupants');

    }
}
