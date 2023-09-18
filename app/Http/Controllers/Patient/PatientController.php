<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index(){
        $title = 'Admin Dashboard';
        return view('admin.home.dashboard', compact('title'));
    }
    public function patientSave(Request $request) {
        dd($request->all());
    }
}
