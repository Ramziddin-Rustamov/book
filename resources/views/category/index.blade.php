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

                <div class="card-header bg-dark text-info text-center">{{ __('Category') }}</div>

                <div class="card-body">
                   <div> <a class="btn btn-primary my-2 py-2 " href="{{route('category.create')}}"> Create a new one </a></div>

                   @if(count($categories))
                   <div>All the categories here !</div>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                              <th scope="col">index</th>
                              <th scope="col">Title</th>
                              <th scope="col">Slug</th>
                              <th scope="col">Book title</th>
                              {{-- <th class="text-info" scope="col">view </th> --}}
                              <th class="text-info" scope="col">Edit </th>
                              <th class="text-danger" scope="col">Dele</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <th scope="row">{{($categories->currentpage()-1)*$categories->perpage()+($loop->index+1)}}</th>
                                <td>{{$category->title}}</td>
                                <td>{{$category->slug}}</td> 
                                <td>
                                @if($category->books)
                                @foreach ($category->books as $books)
                                    <ul class="list">
                                      <li class="list-item">{{$books->title}}</li>
                                    </ul>
                                @endforeach
                                @else
                                <p>Not given book data !</p>
                                @endif
                              </td>
                                {{-- <td> --}}
                                  {{-- <a class="text-primary" href="{{route('category.show',['category'=>$category->id])}}">view</a> --}}
                                {{-- </td> --}}

                                <td>
                                  <a class="text-info" href="{{route('category.edit',['category'=>$category->id])}}">Edit</a>
                                </td>

                                <td>
                                  <form action="{{route('category.destroy',['category'=>$category->id])}}" method="POSt">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Del</button>
                                  </form>
                                </td>

                              </tr>
                            @endforeach
                          </tbody>
                        </table>
                        {{$categories->links()}}
                    @else
                    <div class="text-centern title py-2 my2 "> No category </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
