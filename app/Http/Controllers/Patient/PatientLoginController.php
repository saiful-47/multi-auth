<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
class PatientLoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:patient')->except('logout');
    }
    public function index(){

        if(Auth::guard('patient')->check()){
            return redirect()->route('patient.dashboard');
        }
        return view('patient.login');
    }
    public function patientLoginCheck(Request $request){
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);
        if(Auth::guard('patient')->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])){
            return redirect()->route('patient.dashboard');
        }

        return back()->with('error','The Combination of Username or Password is Wrong!.');
    }
    public function adminLogOut(){
        Auth::guard('patient')->logout();
//        return redirect()->route('admin.login');
        return view('patient.login');
    }
}
