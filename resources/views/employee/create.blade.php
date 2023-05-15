@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-dark text-info text-center">{{ __('Create a Employee') }}</div>
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

                    <form action="{{route('employees.store')}}" method="POST" enctype="multipart/form-data"> 
                        @csrf
                        <div class="mb-3">
                          <label class="form-label">Name</label>
                          <input type="text" name="name" value="{{old('name')}}" class="form-control" autofocus>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" value="{{old('email')}}" class="form-control" autofocus>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password"  class="form-control" autofocus>
                          </div>
                          <div class="mb-3">
                            <label class="form-label"> Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control" autofocus>
                          </div>
                          {{-- <div class="mb-3">
                            <label class="form-label">Image !</label>
                            <input type="file" name="image" value="{{old('image')}}" class="form-control" autofocus>
                          </div> --}}

                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
