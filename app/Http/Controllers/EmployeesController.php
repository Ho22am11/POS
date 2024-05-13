<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{

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
        if($request->hasFile('img')){
            $image = $request->file('img');

            $imagenam = time().'.'.$image->getClientOriginalExtension();

            $image->storeAs('images/employee' ,  $imagenam , 'upload_images' );


        }
       $employee = Employees::create($request->all());

       $employee->update(['img' => 'images/employee/'.$imagenam]);

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
