<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;

class dashboardController extends Controller
{
    public function index(){
        return view('dashboard', [
            'members' => Member::get()->toArray()
        ]);
    }
}
