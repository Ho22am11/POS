<?php

namespace Database\Seeders;

use App\Models\TypeProdect as ModelsTypeProdect;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeProdect extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $names = [ 'computers' , 'Electronics' , 'Clothing' ] ;

        foreach($names as $name ){
            ModelsTypeProdect::create(['name' => $name]);
        }
        
    }
}
