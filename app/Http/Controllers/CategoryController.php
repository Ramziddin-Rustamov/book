<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Exception;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $c =  Category::orderBy('created_at', 'DESC')->paginate(10);
        return view('category.index',[
            'categories'=> $c
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
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
            'title'=>['required']
        ]);

        $c = new Category();
        $c->title = $request->title;
        $c->slug = str_replace(' ','-',$request->title);
        $c->save();
        return redirect()->route('category.index')->with('success','Created successfully ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($category)
    {
        // 
    }





    public function edit($category)
    {
        $category = Category::find($category);
        if($category){
            return view('category.edit',[
                '$category'=>$category
            ]);
            return back(404);
        }
    }





    public function update(Request $request,$category)
    {
        $category = Category::find($category);
        if($category)
        {
            $request->validate([
                'title'=>['required']
            ]);

            $category->title = $request->title;
            $category->slug = str_replace(' ','-',$request->title);
            $category->save();
            return redirect()->route('category.index')->with('success','Updated successfully ');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        try{
            $category->delete();
        return redirect()->route('category.index')->with('success','Deleted successfully ');
        }catch(Exception $e){
        return redirect()->route('category.index')->with('success','You cannot deleted this information !');
        }
    }
}
