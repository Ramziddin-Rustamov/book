@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-dark text-info text-center">{{ __('Create a new category') }}</div>
                <div class="card-body">
                    {{-- begining card --}}
                    <div class="card" style="width: 18rem;">

                        <div class="card-body">
                          <p class="card-text text-info">Title category </p>
                            <h5 class="card-title">{{$category->title}}</h5>
                          <p class="card-text text-info">Created</p>
                          <p class="card-text">{{$category->created_at}}</p>
                         <div>
                            <a href="{{route('category.index')}}">Get back</a>
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
