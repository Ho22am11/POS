<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderIteam;
use App\Models\Prodect;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index()
    {
        $data['prodects'] =  Prodect::all();
        $data['customers'] =  Customer::all();
        $data['orders'] = Order::with('customer.user')->latest()->get();
        return view('pages.order.index' , $data );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $customerId = Customer::where('user_id', auth()->user()->id)->pluck('id')->first();
        if ($request->customer_id == 'cus' ) {
            $order = Order::create([
                'customer_id' => $customerId ,
                'total' => $request->total,
                'user_id' => auth()->user()->id,
            ]);
        } else {
            $order = Order::create([
                'customer_id' => $request->customer_id ,
                'user_id' => auth()->user()->id ,
                'total' => $request->total
            ]);
        }
        


        foreach($request->products as $key => $itemproduct) 
        OrderIteam::create([
            'order_id' =>  $order->id ,
            'prodect_id' => $key ,
            'count' => $itemproduct['count'],
        ]);
        return back() ;
    }

    public function show($id)
    {
        return $id ;
    }


    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
