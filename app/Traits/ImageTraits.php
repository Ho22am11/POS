<?php

namespace App\Traits ;

trait ImageTraits{

    public function storeimage($request , $varabil ){

        if($request->hasFile('img')){
            $image = $request->file('img');

            $imagenam = time().'.'.$image->getClientOriginalExtension();

            $image->storeAs('images/'.$varabil ,  $imagenam , 'upload_images' );

            return $imagenam ;
        }

        
    }

}