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
        dd($request->all());
    }
}
