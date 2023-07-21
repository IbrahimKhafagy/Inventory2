<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=[''];
    protected $dates = ['deleted_at'];




    public function Material()
    {
    //return $this->belongsTo('App\Categories');
     return $this->belongsTo(Material::class,'materials_id','id');


    }
    public function Finished()
    {
    //return $this->belongsTo('App\Categories');
     return $this->belongsTo(finishedpro::class,'materials_id','id');


    }

}
