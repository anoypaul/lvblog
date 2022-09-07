<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Category;
use App\Models\Frontend\Post;
use App\Models\Frontend\Tag;
use App\Models\Frontend\Post_tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

//*** This is the AdminSide Controller **

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = DB::table('posts')
            ->orderBy('posts_id', 'DESC')
            ->join('categories', 'posts.categories_id', '=', 'categories.categories_id')
            ->paginate(5);
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
        $tags = Tag::all();
        
        return view('admin.post.create', compact(['category', 'tags']));
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
        $insertedId = DB::getPdo()->lastInsertId();

        $post_tag = new Post_tag();
        $tags_data = $request->tags;
        foreach ($tags_data as $key => $value) {
            $post_tag->post_id = $insertedId;
            $post_tag->tages_id = $value;
        }
        $post_tag->save();


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
        $post_data = DB::table('posts')
        ->where('posts_id', $id)
        ->orderBy('posts_id', 'DESC')
        ->join('categories', 'posts.categories_id', '=', 'categories.categories_id')
        ->join('post_tag', 'posts.posts_id', '=', 'post_tag.post_id')
        ->get();
        // dd($post_data);
        $tags = Tag::all();
        // dd($tags);

        return view('admin.post.show', compact(['post_data', 'tags']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = DB::table('posts')
            ->where('posts_id', $id)
            ->orderBy('posts_id', 'DESC')
            // ->join('categories', 'posts.posts_id', '=', 'categories.categories_id')
            // ->join('post_tag', 'posts.posts_id', '=', 'post_tag.post_id')
            ->get();
        dd($post);
        $tags = Tag::all();

        return view('admin.post.edit', compact(['post', 'tags']));
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
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            // 'category' => 'required',
        ]);
        $post = Post::find($id);

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

        $insertedId = DB::getPdo()->lastInsertId();

        $tags_data = $request->tags;
        $data = implode($tags_data);
        $post_tag = DB::table('post_tag')->where('posts_id', $id)->update([
            'tages_id' => $data,
        ]);

        // $post_tag = new Post_tag();
        // $tags_data = $request->tags;
        // $data = implode($tags_data);
        // $post_tag->posts_id = $insertedId;
        // $post_tag->tages_id = $data;
        // foreach ($tags_data as $key => $value) {
        //     $post_tag->posts_id = $insertedId;
        //     $post_tag->tages_id = $value;
        // }
        // $post_tag->save();


        $request->session()->flash('success', 'Data Inserted successfully');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $post = Post::where('posts_id', $id);
       $post_tag = Post_tag::where('post_id', $id);
       if(!is_null($post)){
            // unlink($post->posts_image);
            // if(file_exists(public_path($post->posts_image))){
            //     dd('found');
            // }
            // else{
            //     dd('not found');
            // }
            $post->delete();
            $post_tag->delete();
       }
       if(!is_null($post_tag) ){
            $post_tag->delete();
       }
       return redirect()->back();
    }
}
