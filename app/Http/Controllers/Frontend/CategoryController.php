<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

//*** This is the AdminSide Controller **

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::orderBy('categories_id', 'DESC')->paginate(5);
        return view('admin.category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
            'name' => 'required|unique:categories,categories_name',
        ]);

        $category = DB::table('categories')
        ->updateOrInsert(
            [
                'categories_name' => $request->name,
                'categories_slug' => Str::slug($request->name, '-'),
                'categories_description' => $request->description,
            ]
        );
        Session::flash('success','Data Inserted Successfully!'); 
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
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
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
        // dd($request->all());
        $category = Category::find($id);
        
        $request->validate([
            'name' => 'required|unique:categories,categories_name',
        ]);

        $category = DB::table('categories')
            ->where('categories_id', $id)
            ->update(
                [
                    'categories_name' => $request->name,
                    'categories_slug' => Str::slug($request->name, '-'),
                    'categories_description' => $request->description,
                ]
            );

        Session::flash('success','Data Update Successfully!'); 
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
        // $category = Category::find($id)->delete();
        $category = Category::where('categories_id', $id);
        if (!is_null($category)) {
            $category->delete();
        }
        Session::flash('success','Data Deleted Successfully!'); 
        return redirect()->back();
    }
}
