<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Category;
use App\Models\Frontend\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::orderBy('posts_id', 'DESC')->paginate(5);
        return view('admin.post.index', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('admin.post.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:posts,posts_title',
            'image' => 'required|image',
            'description' => 'required',
            'category' => 'required',
        ]);
        $post = new Post();

        $post->posts_title = $request->title;
        $post->posts_slug = Str::slug($request->title, '-');
        if($request->has('image')){
            $image = $request->image;
            $image_new_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move('image/', $image_new_name);
            $post->posts_image = $image_new_name;
        }
        $post->posts_description = $request->description;
        $post->categories_id = $request->category;
        $post->user_name= $request->name;
        $post->post_published_at = Carbon::now();

        $post->save();

        // if($request->has('image')){
        //     $image = $request->image;
        //     $image_new_name = time() . '.' . $image->getClientOriginalExtension();
        //     $image->move('storage/image', $image_new_name);
        //     $post->posts_image = '/storage/image'.$image_new_name;
        //     $post->save();
        // }

        $request->session()->flash('success', 'Data Inserted successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
