<?php

namespace App\Http\Controllers;

use App\Events\EmployeeCreated;
use App\Models\Employee;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = User::where('status',2)->paginate(10);
        return view('employee.index',[
            'employees'=>$employees
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string',
            'email'=>'required|unique:users,email',
            'password'=>'required|confirmed',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->status = '2';
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('employees.index')->with('success','Employee added successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show($employee)
    {
        $employee = User::find($employee);
        if($employee){
            return view('employee.show',[
                'employee'=>$employee
            ]);
        }
        return redirect()->route('employees.index')->with('error','Something went wrong try again !');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($employee)
    {
        $employee = User::find($employee);
        if($employee){
            return view('employee.edit',[
                'employee'=>$employee
            ]);
            return back(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $employee)
    {
        $employee = User::find($employee);
        if($employee)
        {
            $request->validate([
                'name'=>'required|string',
                'email'=>'required|email',
                'password'=>'required|confirmed',
            ]);

        $employee->name = $request->name;
        $employee->status = '2';
        $employee->email = $request->email ?? $employee->email;
        $employee->password = Hash::make($request->password);
        $employee->save();
        return redirect()->route('employees.index')->with('success','Employee updated successfully !');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($employee)
    {
        $employee = User::find($employee);
        if($employee){
            try{
                $employee->delete();
            return redirect()->route('employees.index')->with('success','Deleted successfully ');
            }catch(Exception $e){
            return redirect()->route('employees.index')->with('success','You cannot deleted this Employee !');
            }
        }
       
    }
}
