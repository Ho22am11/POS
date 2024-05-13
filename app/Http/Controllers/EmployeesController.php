<?php

namespace App\Http\Controllers;

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


    public function store(Request $request)
    {
     
       $employee = Employees::create($request->all());
       $imagenam = $this->storeimage($request , 'employee');
       $employee->update(['img' => 'images/employee/'.  $imagenam ]);
        return back();
    }

    public function show(Employees $employees)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employees $employees)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employees $employees)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employees $employees)
    {
        //
    }
}
