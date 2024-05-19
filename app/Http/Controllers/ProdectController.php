<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdectRequest;
use App\Models\Prodect;
use App\Models\TypeProdect;
use Illuminate\Http\Request;
use App\Traits\ImageTraits ;
class ProdectController extends Controller
{
    use ImageTraits;

    public function index()
    {
        $data['prodects'] = Prodect::latest()->get();
        $data['types'] = TypeProdect::all();
        return view('pages.prodect.index' , $data );
    }

    public function create()
    {
        //
    }


    public function store(ProdectRequest $request)
    {
        $request->validated();
       
        $product =  Prodect::create($request->all());

        $imgmame = $this->storeimage($request , 'prodect');

        $product->update(['img' => 'images/prodect/'.$imgmame]);


        return back()->with('success', 'Customer added successfully.');


    }


    public function viewprodect()
    {
        $prodects = Prodect::all(); 
        return view('dashboard' , compact('prodects'));
    }

    public function edit($id)
    {
        $data['prodect'] = Prodect::findOrFail($id);
        $data['types'] = TypeProdect::all();
        return view('pages.prodect.edit' , $data );

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $prodect = Prodect::findOrFail($id);
       
        if($prodect->img != $request->img){
            $prodect->update($request->all());

            $imgmame =  $this->storeimage($request , 'prodect');

            $prodect->update(['img' => 'images/prodect/'.$imgmame]);

          

        }else{
            $prodect->update($request->all());
            
        }

        return redirect()->route('prodects.index');
        

        
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prodect $prodect)
    {
        //
    }
}
