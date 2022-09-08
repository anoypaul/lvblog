<?php

namespace App\Http\Controllers;
use App\Models\Frontend\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(){
        // $post = Post::orderBy('posts_id', 'DESC')->paginate(5);
        $post = DB::table('posts')
            ->orderBy('posts_id', 'DESC')
            ->leftJoin('categories', 'posts.categories_id', '=', 'categories.categories_id')
            ->take(5)
            ->get();
        $fastPost = $post->splice(0, 2);
        $middlePost = $post->splice(0, 1);
        $thirdPost = $post->splice(0);

        $footer_post = DB::table('posts')
            ->inRandomOrder()
            ->leftJoin('categories', 'posts.categories_id', '=', 'categories.categories_id')
            ->take(4)
            ->get();
        $fast_footer_post = $footer_post->splice(0, 1);
        $middle_footer_post = $footer_post->splice(0, 2);
        $third_footer_post = $footer_post->splice(0);
        // dd($third_footer_post);


        $recent_post = DB::table('posts')
            ->orderBy('posts_id', 'DESC')
            ->leftJoin('categories', 'posts.categories_id', '=', 'categories.categories_id')
            ->paginate(9);
        return view('frontend.index', compact(['recent_post', 'fastPost', 'middlePost', 'thirdPost', 'fast_footer_post', 'middle_footer_post', 'third_footer_post']));
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
