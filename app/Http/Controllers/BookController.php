<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $books = Book::orderBy('id', 'DESC')->paginate(10);
        return view('book.index',[
            'books'=>$books
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat = Category::all();
        return view('book.create',[
            'categories'=>$cat
        ]);
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
        'title'=>['required'],
        'category_id'=>['required','exists:categories,id'],
        'author'=>['required'],
        'rating'=>['required'],
        'description'=>['required'],
        'image'=>['required','mimes:jpeg,png,jpg,webp'],
    ]);

    if($request->file('image')){
        $getImage = $request->file('image');
        $imageName = $getImage->getClientOriginalName();
        $imageFullName = time().''. $imageName;
        $imageFullName = str_replace([' '],[''],$imageFullName);
        $imagePath = $getImage->move(('images'),$imageFullName);
    }

    $book = new Book();
    $book->title = $request->title;
    $book->category_id = $request->category_id;
    $book->slug  = str_replace(' ', '-', $request->title);
    $book->author = $request->author;
    $book->description = $request->description;
    $book->rating = $request->rating;
    $book->image = $imagePath;
    $book->save();
    return redirect()->route('book.index')->with('success',' A new book added successfully !');    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('book.show',compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($book)
    {
        $book = Book::find($book);
        if($book){
         return view('book.edit',[
             'book'=>$book,
         ]);
        }
        return redirect()->route('book.index')->with('errors', 'Not found');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $book)
    {
        $book = Book::find($book);
        if($book){
            $request->validate([
                'title'=>['required'],
                'author'=>['required'],
                'rating'=>['required'],
                'description'=>['required'],
            ]);
            if($request->file('image')){
                $getImage = $request->file('image');
                $imageName = $getImage->getClientOriginalName();
                $imageFullName = time().''. $imageName;
                $imageFullName = str_replace([' '],[''],$imageFullName);
                $imagePath = $getImage->move(('images'),$imageFullName);
            }

            $book->title = $request->title ; 
            $book->category_id = $request->category_id ; 
            $book->slug = str_replace(' ', '-', $request->title) ; 
            $book->author = $request->author ; 
            $book->description = $request->description ; 
            $book->rating = $request->rating ; 
            $book->image = $imagePath ?? $book->image; 
            $book->save();
            return redirect()->route('book.index')->with('success','Book Has Been updated successfully');
        }     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($book)
    {
        $book = Book::find($book);
            if($book){
                $file = File::exists(public_path($book->image));
                if($file){
                    File::delete(public_path($book->image));
                    $book->delete();
                    return redirect()->route('book.index')->with('success', 'Book is  Deleted');
                }
                $book->delete();
                return redirect()->route('book.index')->with('success', 'Book is  Deleted');
            }
            return redirect()->route('book.index')->with('errors', ' Book Not found');
    }
}
