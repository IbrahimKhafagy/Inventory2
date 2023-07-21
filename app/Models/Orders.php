<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Orders extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable=
             [''];

             protected $table = 'orders';

             public function mate()
             {
              return $this->belongsTo(Material::class,'materials_id','id');
             }

             public function Finished()
             {
              return $this->belongsTo(finishedpro::class,'materials_id','id');
             }






}
