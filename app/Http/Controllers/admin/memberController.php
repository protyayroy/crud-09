<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class memberController extends Controller
{
    //  ADD/EDIT MEMBER
    public function index(Request $request, $id = null)
    {

        if ($id == "") {
            $title = "Add";
            $members = new Member;
            $message = "Member has been added successfully";
        } else {
            $title = "Edit";
            $members = Member::find($id);
            $message = "Member has been updated successfully";
        }

        if ($request->isMethod('post')) {
            // $data = $request->all();
            // dd($data);
            $request->validate([
                'name' => 'required',
                'address' => 'required',
            ]);

            if ($request->hasFile('image')) {

                $image_tmp = $request->file('image');
                if ($image_tmp->isValid()) {
                    // DELETE PREVIOUS IMAGE
                    $previous_image_path = 'images/member_image/' . $members->image;
                    if (File::exists($previous_image_path)) {
                        File::delete($previous_image_path);
                    }
                    // GET FULL IMAGE NAME WITH EXTENTION
                    $image_full_name = $image_tmp->getClientOriginalName();

                    // GET IMAGE NAME WITHOUT EXTENSION
                    $image_first_name = pathinfo($image_full_name, PATHINFO_FILENAME);

                    // GET IMAGE EXTENSION
                    $extention = $image_tmp->getClientOriginalExtension();

                    // TO GET UNIQUE IMAGE NAME
                    $unique = Str::random(10);

                    // SET UNIQUE IMAGE NAME
                    $image_name = $image_first_name . $unique . '.' . $extention;

                    // SET IMAGE PATH
                    $image_path = 'images/member_image/' . $image_name;
                    Image::make($image_tmp)->resize(500, 500)->save($image_path);
                }
            } else {
                $image_name = $members->image;
            }

            $members->name = $request->name;
            $members->address = $request->address;
            $members->image = $image_name;
            $members->save();

            return redirect('dashboard')->with('success_msg', $message);
        }


        return view('member.add-edit', compact('title', 'members'));
    }

    //  DELETE MEMBER
    public function destroy($id)
    {
        $members = Member::find($id);

        // DELETE PREVIOUS IMAGE
        $previous_image_path = 'images/member_image/' . $members->image;
        if (File::exists($previous_image_path)) {
            File::delete($previous_image_path);
        }
        $members->delete();
        return back()->with('warning_msg', 'Member has been deleted successfully');
    }
}
