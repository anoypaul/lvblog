<?php

namespace App\Http\Controllers;
use App\Models\Frontend\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(){
        // $recent_post = Post::orderBy('posts_id', 'DESC')->paginate(9);
        $recent_post = DB::table('posts')
            ->orderBy('posts_id', 'DESC')
            ->leftJoin('categories', 'posts.categories_id', '=', 'categories.categories_id')
            ->paginate(9);
            // dd($recent_post);
        return view('frontend.index', compact('recent_post'));
    }

    public function category(){
        return view('frontend.category');
    }

    public function single($slug){
        // $single_data = Post::where('posts_slug', $slug)->first();
        $single_data = DB::table('posts')
            ->where('posts_slug', '=', $slug)
            ->leftJoin('categories', 'posts.categories_id', '=', 'categories.categories_id')
            ->first();
        return view('frontend.single', compact('single_data'));
    }
}
