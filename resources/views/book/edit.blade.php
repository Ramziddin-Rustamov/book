@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-dark text-info text-center">{{ __('Create a new book') }}</div>
                <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{route('book.update',['book'=>$book->id])}}" method="post"  enctype="multipart/form-data"> 
                        @csrf
                        @method('PUT')
                        @if ($book)
                        <div class="mb-3">
                            <label class="form-label">Title of the book</label>
                            <input type="text" name="title" value="{{$book->title}}" class="form-control" autofocus>
                          </div>
                          <div class="mb-3">
                              <label class="form-label">Author of the book</label>
                              <input type="text" name="author" value="{{$book->author}}" class="form-control" autofocus>
                            </div>
                            <div class="mb-3">
                              <label class="form-label">Rating of the book</label>
                              <input type="number" name="rating" value="{{$book->rating}}" max="5" min="1" class="form-control" autofocus>
                            </div>
                            <div class="mb-3">
                                <a href="{{asset($book->image)}}">
                                  <img class="img rounded embed-responsise w-25 h-16" src="{{asset($book->image)}}" alt="">
                               </a>
                              <label class="form-label">Image of the book please don't touch image if you want to remain it ! </label>
                              <input type="file" name="image"  class="form-control" autofocus>
                            </div>
  
                            <div class="mb-3">
                              <label class="form-label">Description of the book</label>
                             <div class="form-floating">
                                  <textarea class="form-control" name="description" placeholder="Description" id="floatingTextarea2" style="height: 100px">
                                      {{$book->description}}
                                  </textarea>
                                  <label for="floatingTextarea2">Description</label>
                                  </div>
                            </div>
                        @else
                            <div class="text-large text-danger">Book Not Fount <a href="{{route('book.index')}}">try again </a></div>
                        @endif
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
