<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;

class memberController extends Controller
{
    public function index(Request $request, $id = null){

        if($id == ""){
            $title = "Add";
            $members = new Member;
        }
        else{
            $title = "Edit";
            $members = Member::find($id);
        }

        if($request->isMethod('post')){
            // $data = $request->all();
            // dd($data);
            $members->name = $request->name;
            $members->address = $request->address;
            $members->image = '';
            $members->save();

            return redirect('dashboard')->with('massage');
        }


        return view('member.add-edit', compact('title','members'));
    }
}
