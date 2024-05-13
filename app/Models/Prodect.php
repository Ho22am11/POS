<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodect extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function typeprodect(){
        return $this->belongsTo('App\Models\TypeProdect' , 'id_type');
    }
}
