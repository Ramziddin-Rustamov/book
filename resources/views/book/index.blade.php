@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">


                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('error'))
                <div class="alert alert-success">
                    {{ session('error') }}
                </div>
            @endif

                <div class="card-header bg-dark text-info text-center">{{ __('Books') }}</div>

                <div class="card-body">
                   <div> <a class="btn btn-primary my-2 py-2 " href="{{route('book.create')}}"> Create a new one </a></div>

                   @if(count($books))
                   <div>All the books here !</div>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                              <th scope="col">index</th>
                              <th scope="col">Title</th>
                              <th scope="col">Author</th>
                              <th scope="col">Description</th>
                              <th scope="col">Rate</th>
                              <th scope="col">image</th>
                              <th scope="col">Category</th>
                              <th scope="col">view</th>
                              <th class="text-info" scope="col">Edit </th>
                              <th class="text-danger" scope="col">Dele</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($books as $book)
                            <tr>
                                <th scope="row">{{($books->currentpage()-1)*$books->perpage()+($loop->index+1)}}</th>
                                <td>{{$book->title}}</td>
                                <td>{{$book->author}}</td>
                                <td>{{$book->description}}</td>
                                <td>{{$book->rating}}</td>
                                
                                <td>
                                    <a href="{{asset($book->image)}}">
                                    <img class="img rounded embed-responsise w-25 h-16" src="{{asset($book->image)}}" alt="">
                                    </a>
                                </td>
                                <td>{{$book->category->title}}</td>


                                <td>
                                  <a class="text-primary" href="{{route('book.show',['book'=>$book->id])}}">view</a>
                                </td>

                                <td>
                                  <a class="text-info" href="{{route('book.edit',['book'=>$book->id])}}">Edit</a>
                                </td>

                                <td>
                                  <form action="{{route('book.destroy',['book'=>$book->id])}}" method="POSt">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Del</button>
                                  </form>
                                </td>

                              </tr>
                            @endforeach
                          </tbody>
                        </table>
                        {{$books->links()}}
                    @else
                    <div class="text-centern title py-2 my2 "> No book </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
