<?php

namespace App\Http\Controllers;

use App\Http\Requests\OccupantStoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::latest()->get();

        return view('users.index', compact('user'));
    }

    public function importIndex()
    {
        return view('users.import');
    }

    public function import(Request $request)
    {
        $validator = Excel::import(new UsersImport,request()->file('file'));
        
        Alert::success('Success', 'Users Imported Successfully!');
           
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
    public function store(UserStoreRequest $request)
    {
        $user = new User;

        $user->create($request->except('role'));
        Alert::toast('User was successfully created!', 'success');

        return back();
    }

    public function tenantStore(OccupantStoreRequest $request)
    {
        $user = new User;

        $data = $request->except('role');
        $data['role'] = 'tenant';
        $data['password'] = 'Sadara2021';

        $user->create($data);
        Alert::toast('Tenant was successfully created!', 'success');

        return back();
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
        $user = User::findOrFail($id);
      
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $user = User::findOrFail($id);
       
    
        if(trim($request->password) == '') {
            
            $data = $request->except('password');
            $user->update($data);
        }else{
            $data = $request->all();
            $user->update($data);
        }

        Alert::toast('User was successfully updated!', 'success');

        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        Alert::success('Success', 'User was successfully deleted!');

        return back();
    }
}
