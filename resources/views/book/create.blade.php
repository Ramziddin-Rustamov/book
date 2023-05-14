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
                    <form action="{{route('book.store')}}" method="POST" enctype="multipart/form-data"> 
                        @csrf
                        <div class="mb-3">
                          <label class="form-label">Title of the book</label>
                          <input type="text" name="title" value="{{old('title')}}" class="form-control" autofocus>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Author of the book</label>
                            <input type="text" name="author" value="{{old('author')}}" class="form-control" autofocus>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Choose Category </label>
                            <select class="form-select" aria-label="Default select example" name="category_id">
                                <option selected>Select Category</option>
                                @if(count($categories))
                                @foreach ($categories as  $item )
                                <option value="{{$item->id}}">{{$item->title}}</option>
                                @endforeach
                                @else
                                <option disabled> There is no category yet please create new one !</option>
                                @endif
                              </select>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Rating of the book</label>
                            <input type="number" name="rating" value="{{old('rating')}}" max="5" min="1" class="form-control" autofocus>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Image of the book</label>
                            <input type="file" name="image" value="{{old('image')}}" class="form-control" autofocus>
                          </div>

                          <div class="mb-3">
                            <label class="form-label">Description of the book</label>
                           <div class="form-floating">
                                <textarea class="form-control" name="description" placeholder="Description" id="floatingTextarea2" style="height: 100px">
                                    {{old('description')}}
                                </textarea>
                                <label for="floatingTextarea2">Description</label>
                                </div>
                          </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
