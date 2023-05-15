@extends('layouts.app')

@section('content')
<div class="container mx-auto ">
    <div class="row">
        <h1 class="text-info text-center py-2 my-2">Our Books</h1>
            @if(count($books))
                @foreach ($books as $book)
                    <div class="col-md-3 mt-3">
                        <div class="card" style="width: 18rem;">
                    <img src="{{$book->image}}" class="card-img-top" alt="book image">
                    <div class="card-body">
                    <h6 class="card-title">Name of  the book</h6>
                    <h5 class="text-info">{{$book->title}}</h5>
                    <h6 class="card-title">Author</h6>
                    <h5 class="text-info">{{$book->title}}</h5>
                    <h6 class="card-title">Category</h6>
                    <h5 class="text-info">{{$book->category->title}}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Rate :  {{$book->rating }}</h6>
                    <p class="card-text">
                        {{ substr(strip_tags($book->description), 0, 100) }}
                        {{ strlen(strip_tags($book->description)) > 5 ? "..." : "" }} 
                    </p>
                    
                        <a class="" href="{{ route('book.reader',$book->id) }}">Read More</a>
                    </div>
                    </div>
                </div>  
                @endforeach
            @else
                <h4 class="text-center text-info py-2 my-2 bordered">No book yet !</h4>
            @endif
           <div class="py-3 my-3">
            {{$books->links()}}
           </div>
       </div>
    </div>
@endsection
