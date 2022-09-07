<?php

namespace App\Http\Controllers;
use App\Models\Frontend\Post;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $recent_post = Post::orderBy('posts_id', 'DESC')->paginate(9);
        return view('frontend.index', compact('recent_post'));
    }

    public function category(){
        return view('frontend.category');
    }

    public function single(){
        return view('frontend.single');
    }
}
