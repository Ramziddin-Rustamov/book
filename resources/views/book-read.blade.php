@extends('layouts.app')

@section('content')
<div class="container ">
   
                    <div class="col-md-12 col-12  mt-3">
                <div class="card" >
                   <div class="row">
                    <div class="col-md-6 col-12">
                        <a href="{{$bookreader->image}}">
                            <img class="rounded embed-responsive w-32 " src="{{$bookreader->image}}" class="card-img-top" alt="bookreader image">
                        </a>
                    </div>
                    <div class="col-md-6 col-12">
                        <h6 class="card-title py-5">Name of  the book</h6>
                        <h5 class="text-info">{{$bookreader->title}}</h5>
                        <h6 class="card-title">Author</h6>
                        <h5 class="text-info">{{$bookreader->title}}</h5>
                        <h6 class="card-title">Category</h6>
                        <h5 class="text-info">{{$bookreader->category->title}}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Rate :  {{$bookreader->rating }}</h6>
                    </div>
                   </div>
                    <div class="card-body">
                    <p class="card-text">
                        {{$bookreader->description }}
                    </p>

                    @if(count($bookreader->comments))
                    <h3 class="text-info">Here some  comments ! </h3>
                        @foreach ($bookreader->comments as $comment)
                            <p class="card-text">
                                {{$comment->body}}
                            </p>
                            <p>Created : {{$comment->created_at}}</p> 
                            <p>Commented By: {{$comment->user->name}}</p>
                            <hr>
                        @endforeach
                    @else
                    <h3 class="text-info">No  comments yet </h3>
                    @endif
                    

                    <form action="{{route('comment.store')}}" method="POST">
                    @csrf
                    <input type="hidden" name="book_id" value="{{$bookreader->id}}" >
                    <label class="form-lable" for="">Comment</label>
                    <textarea class="form-control my-2 mt-2" name="body" id="" cols="10" rows="4"></textarea>
                    <button type="submit" class="btn btn-info">Submit</button>
                    </form>
                    
                    </div>
                    </div>
                </div>  
    </div>
@endsection
