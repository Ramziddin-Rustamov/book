@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-dark text-info text-center">{{ __('Update a existing employee') }}</div>
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
                    <form action="{{route('employees.update',['employee'=>$employee->id])}}" method="post"  enctype="multipart/form-data"> 
                        @csrf
                        @method('PUT')
                        @if ($employee)
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" value="{{$employee->name}}" class="form-control" autofocus>
                          </div>
                          <div class="mb-3">
                              <label class="form-label">Email</label>
                              <input type="email" name="email" value="{{$employee->email}}" class="form-control" autofocus>
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
                                <a href="{{asset($employee->image)}}">
                                  <img class="img rounded embed-responsise w-25 h-16" src="{{asset($employee->image)}}" alt="">
                               </a>
                              <label class="form-label">Image of the employee please don't touch image if you want to remain it ! </label>
                              <input type="file" name="image"  class="form-control" autofocus>
                            </div> --}}

                        @else
                            <div class="text-large text-danger">Employee Not Fount <a href="{{route('employee.index')}}">try again </a></div>
                        @endif
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
