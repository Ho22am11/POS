<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Employees;
use Illuminate\Http\Request;
use App\Traits\ImageTraits ;
class EmployeesController extends Controller
{

    use ImageTraits ;

    public function index()
    {
        $employees = Employees::all();
        return view('pages.employee.index' , compact('employees'));
    }


    public function create()
    {
        
    }


    public function store(EmployeeRequest $request)
    {
     
        $request->validated();
       $employee = Employees::create($request->all());
       $imagenam = $this->storeimage($request , 'employee');
       $employee->update(['img' => 'images/employee/'.  $imagenam ]);
       return back()->with('success', 'Customer added successfully.');
    }

    public function show(Employees $employees)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $employee = Employees::findOrFail($id);
        return view('pages.employee.edit' , compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request , $id )
    {
        $employee = Employees::findOrFail($id);
        if ($request->img != $employee->img){
            $employee->update($request->all());

            $imgmame =  $this->storeimage($request , 'employee');

            $employee->update(['img' => 'images/employee/'.$imgmame]);

        }else{
            $employee->update($request->all());
            
        }

        return redirect()->route('employees.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employees $employees)
    {
        //
    }
}
