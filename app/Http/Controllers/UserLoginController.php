<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResetpasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UserLoginController extends Controller
{
    
    public function resetPassword()
    {
        return view('admin.password.reset-password');
    }

    public function newPassword(ResetpasswordRequest $request)
    {
       $user = User::findOrFail(auth()->user()->id);
       $user->whereid(auth()->user()->id)
       ->update(array(
           'password' => bcrypt($request->password)
           ));

    Alert::toast('Your password was successfully updated!', 'success');

        return redirect('/home');
    }

    public function help()
    {
       return view('help');
    }
}
