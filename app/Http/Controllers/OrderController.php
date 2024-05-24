<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderIteam;
use App\Models\Prodect;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index()
    {
        $prodects = Prodect::all();
        return view('pages.order.index' , compact('prodects' ));
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
        $order = Order::create([
            'customer_id' => 1 ,
            'total' => $request->total
        ]);

        foreach($request->products as $key => $count) 
        OrderIteam::create([
            'order_id' =>  $order->id ,
            'prodect_id' => $key ,
            'count' => $count['count'],
        ]);
        return $request ;
    }

    public function show(Order $order)
    {
        //
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
