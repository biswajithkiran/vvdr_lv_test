<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Company;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$arrEmployee = Employee::all();
        $arrEmployee = Employee::with('company')->get();        
        return view('admin.employee.index', ['arrEmployee' => $arrEmployee]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arrCompany   = Company::orderBy('name', 'ASC')->get()->toArray();        
        return view('admin.employee.create', ['arrCompany' => $arrCompany]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEmployeeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeRequest $request)
    {      
        $this->validate($request, [
                              'first_name'    => 'required',
                              'last_name'    => 'required',
                              'email'   => 'required|email|unique:employees',  
                              'company'    => 'required',
                              'phone'    => 'sometimes|required',                            
                                ]);

        $objE                   = new Employee();
        $objE->first_name       = $request->first_name;
        $objE->last_name        = $request->last_name;
        $objE->email            = $request->email;
        $objE->cid              = $request->company;               
        $objE->phone            = $request->phone;        
        $objE->save();
        $message                = 'New employee created successfully';
        return redirect()->route('employees.index')->with('success', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $arrCompany   = Company::orderBy('name', 'ASC')->get()->toArray();
        return view('admin.employee.edit', compact('employee','arrCompany'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEmployeeRequest  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $this->validate($request, [
                              'first_name'      => 'required',
                              'last_name'       => 'required',                              
                              'company'         => 'required',
                              'phone'           => 'sometimes|required',                            
                                ]);
        $arrEmployee = Employee::find($employee->id);
        //$arrEmployee->fill($request->all());

        $arrEmployee->first_name    = $request->first_name;
        $arrEmployee->last_name     = $request->last_name;        
        $arrEmployee->cid           = $request->company;               
        $arrEmployee->phone         = $request->phone;        
        $arrEmployee->save();
        $message                    = 'Details updated successfully';
        return redirect()->route('employees.index')->with('success', $message);        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee    = Employee::find($employee->id);
        $employee->delete();
        $message    = 'Record deleted successfully';
        return redirect()->route('employees.index')->with('success', $message); 
    }
}
