@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-dark text-info text-center">{{ __('view a new book') }}</div>
                <div class="card-body">
                    {{-- begining card --}}
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="{{asset($book->image)}}" alt="book image">
                        <div class="card-body">
                          <p class="card-text text-info">Name of the book</p>
                            <h5 class="card-title">{{$book->title}}</h5>
                          <p class="card-text text-info">Creaded by</p>
                          <p class="card-text">{{$book->author}}</p>
                          <p class="card-text text-info">Rate</p>
                          <p class="card-text">{{$book->rating}}</p>
                          <p class="card-text text-info">Created</p>
                          <p class="card-text">{{$book->created_at}}</p>
                         <div>
                            <a href="{{route('book.index')}}">Get back</a>
                         </div>
                        </div>
                      </div>
                    {{-- end -card body --}}
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
