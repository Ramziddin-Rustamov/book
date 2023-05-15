@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-dark text-info text-center">{{ __('Create a new book') }}</div>
                <div class="card-body">
                    {{-- begining card --}}
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="..." alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{$employee->name}}</h5>
                          <p class="card-text">{{$employee->email}}</p>
                          <p class="card-text">{{$employee->creted_at}}</p>
                         <div>
                            <a href="{{route('employees.index')}}">Get back</a>
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
