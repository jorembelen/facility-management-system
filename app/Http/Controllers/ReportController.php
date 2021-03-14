<?php

namespace App\Http\Controllers;

use App\Models\ClientAppointment;
use App\Models\WorkCategory;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $categories = WorkCategory::all();

        // return $request->all();
        $appointments = new ClientAppointment();

        if($request->work_category_id) {
            $category = WorkCategory::findOrFail($request->work_category_id);
            $categoriesName = $category->name;
            $appointments =  $appointments->wherework_category_id($request->work_category_id);
        }else{
            $categoriesName = '';
        }

        if($request->start_date) {
            $appointments = $appointments->where('date', '>=', $request->start_date);
        }

        if($request->end_date) {
            $appointments = $appointments->where('date', '<=', $request->end_date);
        }

        if($request->end_date < $request->start_date){
            Alert::error('Error', 'End date should be greater than Start date!'); 
        }

        $appointments = $appointments->latest()->get();

      return view('reports.index', compact('appointments', 'categories', 'categoriesName'));
    }

    public function report(Request $request)
    {
        # code...
    }
}
