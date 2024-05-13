<?php

namespace App\Http\Controllers;

use App\Models\Prodect;
use Illuminate\Http\Request;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ProdectController extends Controller
{

    public function index()
    {
        $prodects = Prodect::all();
        return view('pages.prodect.index' , compact('prodects'));
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->hasFile('img')){
            $image = $request->file('img');
            $imgmame = time(). '.' . $image->getClientOriginalExtension();
            $image->storeAs('images/prodect/' , $imgmame , 'upload_images' );
        }

        $product =  Prodect::create($request->all());

  
        $product->update(['img' => 'images/prodect/'.'.'.$imgmame]);


        return back();



    }

    /**
     * Display the specified resource.
     */
    public function show(Prodect $prodect)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prodect $prodect)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prodect $prodect)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prodect $prodect)
    {
        //
    }
}
