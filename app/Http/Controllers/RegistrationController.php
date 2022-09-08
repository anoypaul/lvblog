<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;

class RegistrationController extends Controller
{
    public function index(){
        return view('admin.authentication.login');
    }
    public function registration(){
        return view('admin.authentication.registration');
    }
    public function create(Request $request){
        // dd($request->all());
        $request->validate([
            'name' => 'required|max:30',
            'mobile' => 'required|number',
            'email'=> 'required|email',
            'password'=> 'required',
        ]);
    }
   
}
