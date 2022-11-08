<?php

namespace App\Http\Controllers\Font;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function show_admin(){
        return view('front.admin.dashboard');
    }
}
