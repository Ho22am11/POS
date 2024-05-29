<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\CustomerRequest ;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::all();
        return view('pages.customer.index' , compact('customers'));
    }

    public function create()
    {
        //
    }

    public function store(CustomerRequest $request)
    {
        $request->validated();
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'email_verified_at' => now() ,
            'password' => Hash::make($request->password),
        ])->assignRole('user');

        Customer::create([
            'user_id' => $user->id ,
            'addrese' => $request->addrese ,
            'num' => $request->num ,
        ]);
        return back()->with('success', 'Customer added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);      
        return view('pages.customer.edit' , compact('customer') ) ;
    }

    
    public function update(Request $request, $id )
    {
        $customer = Customer::findOrFail($id);
        $customer->update($request->all());
        return redirect()->route('customers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
