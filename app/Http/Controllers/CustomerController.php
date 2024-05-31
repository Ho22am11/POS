<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\CustomerRequest ;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    protected $Customer;

    public function __construct(Customer $Customer)
    {
        return $this->Customer = $Customer ;
    }

    public function index()
    {
        $customers = $this->Customer->all();
        return view('pages.customer.index' , compact('customers'));
    }


    public function store(CustomerRequest $request)
    {
        DB::beginTransaction(); 

        try {
            $request->validated();
        //frist create user for Customer

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'email_verified_at' => now() ,
            'password' => Hash::make($request->password),
        ])->assignRole('user');


        $data = $request->only(['addrese', 'num']);
        //add value of id user for data 
        $data['user_id'] = $user->id;

        $this->Customer->create($data) ;

        return back()->with('success', 'Customer added successfully.');

        DB::commit();

        } catch(\Exception $e){
            DB::rollBack();
            return back()->with('error', $e->getMessage() );
        }

        
    }


    public function edit($id)
    {
        
        $customer = $this->Customer->findOrFail($id);      
        return view('pages.customer.edit' , compact('customer') ) ;
    }

    
    public function update(Request $request, $id )
    {
        try {

        $customer = $this->Customer->findOrFail($id);
        $customer->update($request->all());
        return redirect()->route('customers.index');
        
        } catch(\Exception $e){
            return back()->with('error', $e->getMessage() );
        }
    }

}
