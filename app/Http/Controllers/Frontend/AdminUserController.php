<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use Illuminate\Http\Request;

//*** This is the AdminSide Controller **

class AdminUserController extends Controller
{
    public function index(){
        $admin_data = Registration::all();
        return view('admin.user.index', compact('admin_data'));
    }

    public function edit(Request $request, $id){
        $admin_edit_data = Registration::find($id);
        return view('admin.user.edit', compact('admin_edit_data'));
    }

    public function update(Request $request, $id){
        // dd($request->all());
        $admin_update_data = Registration::find($id);
        $admin_update_data->registrations_name = $request->name;
        $admin_update_data->registrations_phone = $request->mobile;
        $admin_update_data->registrations_email = $request->email;
        $admin_update_data->registrations_image = $request->image;

        if ($request->has('image')) {
            $image = $request->image;
            $image_new_name = time() .'.'. $image->getClientOriginalExtension();
            $image->move('image/user/', $image_new_name);
            $admin_update_data->registrations_image = $image_new_name;
        }
        $admin_update_data->registrations_description = $request->description;
        $admin_update_data->save();

        $request->session()->flash('success', 'Data Updated successfully');
        return redirect()->back();
    }

    public function delete($id){
        $post_delete = Registration::find($id);
        if(!is_null($post_delete)){
            $post_delete->delete();
        }
       return redirect()->back();

    }
}
