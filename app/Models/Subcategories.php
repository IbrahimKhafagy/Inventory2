<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subcategories extends Model
{
    use HasFactory;
    use SoftDeletes;
protected $guarded=[];
protected $fillable=
[
'Subcategory',
'categories_id',
'Description',
'Created_by'
];

protected $dates = ['deleted_at'];
public function Categ()
{
//return $this->belongsTo('App\Categories');
    return $this->belongsTo(Categories::class,'categories_id','id');


}

public function Matrial()
{
    return $this->hasMany(Material::class);
}

public function Finished()
{
    return $this->hasMany(finishedpro::class);
}

}
