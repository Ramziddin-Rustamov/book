@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-dark text-info text-center">{{ __('Create a new category') }}</div>
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
                    <form action="{{route('category.update',['category'=>$category->id])}}" method="POST"  enctype="multipart/form-data"> 
                        @csrf
                        @method('PUT')
                        @if ($category)
                        <div class="mb-3">
                            <label class="form-label">Title of the category</label>
                            <input type="text" name="title" value="{{$category->title}}" class="form-control" autofocus>
                          </div>
                          <div class="mb-3">
                              <label class="form-label">Author of the category</label>
                              <input type="text" name="author" value="{{$category->slug}}" class="form-control" autofocus>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        @else
                            <div class="text-large text-danger">Book Not Fount <a href="{{route('category.index')}}">try again </a></div>
                        @endif
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
