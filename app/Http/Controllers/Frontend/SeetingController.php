<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Seeting;
use Illuminate\Http\Request;

class SeetingController extends Controller
{
    public function edit(){
        $seeting_data = Seeting::all()->first();
        return view('admin.seeting.edit', compact('seeting_data'));
    }

    public function update(Request $request){
        // dd($request->all());
        $setting = Seeting::find(1);
        $setting->seeting_name = $request->name;
        // $setting->seeting_site_logo = $request->logo;
        if ($request->has('logo')) {
            $logo = $request->logo;
            $logo_new = time() .'.'. $logo->getClientOriginalExtension();
            $logo->move('image/setting/',$logo_new);
            $setting->seeting_site_logo = $logo_new;
        }
        $setting->seeting_about_site = $request->description;
        $setting->seeting_facebook = $request->facebook;
        $setting->seeting_twitter = $request->twitter;
        $setting->seeting_instagram = $request->instagram;
        $setting->seeting_reddit = $request->reddit;
        $setting->seeting_email = $request->email;
        $setting->seeting_copyright = $request->copyright;
        $setting->save();

        $request->session()->flash('success', 'Data Update successfully');
        return redirect()->back();
    }
}
