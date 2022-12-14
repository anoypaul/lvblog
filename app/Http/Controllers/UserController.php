<?php

namespace App\Http\Controllers;

use App\Models\Frontend\Category;
use App\Models\Frontend\Post;
use App\Models\Frontend\Seeting;
use App\Models\Registration;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

//*** This is the UserSide/FrontendSide Controller **

class UserController extends Controller
{
    public function index(){
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


        $recent_post = DB::table('posts')
            ->orderBy('posts_id', 'DESC')
            ->leftJoin('categories', 'posts.categories_id', '=', 'categories.categories_id')
            ->paginate(9);

        $categories = Category::all();

        $setting_data = Seeting::all()->first();
        
        return view('frontend.index', compact(['recent_post', 'fastPost', 'middlePost', 'thirdPost', 'fast_footer_post', 'middle_footer_post', 'third_footer_post', 'categories', 'setting_data']));
    }

    public function category($slug){
        $categories = Category::all();
        $categories_data = Category::where('categories_slug', $slug)->first();
        $setting_data = Seeting::all()->first();

        if ($categories_data) {
            $post_data = Post::where('categories_id', $categories_data->categories_id)
            ->crossJoin('registrations')
            ->paginate(6);
            return view('frontend.category', compact(['categories', 'categories_data', 'post_data', 'setting_data']));
        }
        return redirect()->back();
    }

    public function single($slug){
        $single_data = DB::table('posts')
            ->where('posts_slug', '=', $slug)
            ->leftJoin('categories', 'posts.categories_id', '=', 'categories.categories_id')
            ->leftJoin('post_tag', 'posts.posts_id', '=', 'post_tag.post_id')
            ->leftJoin('tages', 'post_tag.tages_id', '=', 'tages.tages_id')
            ->first();

        $popular_post = DB::table('posts')
            ->inRandomOrder()
            ->leftJoin('categories', 'posts.categories_id', '=', 'categories.categories_id')
            ->crossJoin('registrations')
            ->limit(3)
            ->get();
        $categories = Category::all();

        $related_post = DB::table('posts')->orderBy('categories_id', 'DESC')->inRandomOrder()->take(4)->get();
        $fast_related_post = $related_post->splice(0, 1);
        $second_related_post = $related_post->splice(0, 2);
        $third_related_post = $related_post->splice(0, 1);

        $setting_data = Seeting::all()->first();

        if ($single_data) {
            return view('frontend.single', compact(['single_data', 'popular_post', 'categories', 'fast_related_post', 'second_related_post', 'third_related_post', 'setting_data']));
        }
        return redirect('/');
    }

    public function about(){
        $categories = Category::all();
        $setting_data = Seeting::all()->first();
        $registration_data = Registration::all()->first();
        return view('frontend.about', compact(['categories', 'setting_data', 'registration_data']));
    }

    public function contact(){
        $categories = Category::all();
        $setting_data = Seeting::all()->first();
        $registration_data = Registration::all()->first();
        return view('frontend.contact', compact(['categories', 'setting_data', 'registration_data']));
    }

    public function contact_submit(Request $request){
        // dd($request->all());
        $contact = new Contact();
        $contact->contacts_name = $request->first_name ." ". $request->last_name;
        $contact->contacts_email = $request->email;
        $contact->contacts_subject = $request->subject;
        $contact->contacts_message = $request->message;
        $contact->save();

        $request->session()->flash('success','Data Inserted successfully');
        return redirect()->back();
    }
}
