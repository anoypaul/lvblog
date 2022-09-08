<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use App\Models\Registration;
use Illuminate\Support\Facades\DB;

class RegistrationController extends Controller
{
    public function login_page(){
        return view('admin.authentication.login');
    }

    public function registration(){
        return view('admin.authentication.registration');
    }

    public function create(Request $request){
        $request->validate([
            'name' => 'required|max:30',
            'mobile' => 'required|numeric|min:9',
            'email'=> 'required|email',
            'password'=> 'required',
        ]);
        $registration = new Registration();

        $registration->registrations_name = $request->name;
        $registration->registrations_phone = $request->mobile;
        $registration->registrations_email  = $request->email;
        $registration->registrations_password = $request->password;
        $registration->save();

        $request->session()->flash('status', 'Registration Success');
        return redirect()->back();
    }

    public function login(Request $request){
        $data = DB::table('registrations')
            ->where('registrations_email', $request->email)
            ->orWhere('registrations_password', $request->password)
            ->first();

        if ($data) {
            $request->session()->put('registrations_email', $data->registrations_email);
            return redirect('/super-admin');
        }
        return redirect('/login');

    }

    public function index_page(Request $request){
        if ($request->session()->has('registrations_email')) {
            return view('admin.deshboard.index');
        }
        return redirect('/login');
    }
   
}
