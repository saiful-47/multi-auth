<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $title = 'Admin Dashboard';
        return view('admin.home.dashboard', compact('title'));
    }
    public function test() {
        return view('admin.login');
    }

}
