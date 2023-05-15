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

                <div class="card-header bg-dark text-info text-center">{{ __('All Employees') }}</div>

                <div class="card-body">
                   <div> <a class="btn btn-primary my-2 py-2 " href="{{route('employees.create')}}"> New one </a></div>

                   @if(count($employees))
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                              <th scope="col">Index</th>
                              <th scope="col">Name</th>
                              <th scope="col">email</th>
                              <th scope="col">Registered</th>
                              <th class="text-info" scope="col">view </th>
                              <th class="text-info" scope="col">Edit </th>
                              <th class="text-danger" scope="col">Dele</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($employees as $employee)
                            <tr>
                                <th scope="row">{{($employees->currentpage()-1)*$employees->perpage()+($loop->index+1)}}</th>
                                <td>{{$employee->name}}</td>
                                <td>{{$employee->email}}</td>
                                <td>{{$employee->created_at}}</td>
                                <td>
                                  <a class="text-primary" href="{{route('employees.show',['employee'=>$employee->id])}}">view</a>
                                </td>

                                <td>
                                  <a class="text-info" href="{{route('employees.edit',['employee'=>$employee->id])}}">Edit</a>
                                </td>

                                <td>
                                  <form action="{{route('employees.destroy',['employee'=>$employee->id])}}" method="POSt">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Del</button>
                                  </form>
                                </td>

                              </tr>
                            @endforeach
                          </tbody>
                        </table>
                        {{$employees->links()}}
                    @else
                    <div class="text-centern title py-2 my2 "> No employees </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
