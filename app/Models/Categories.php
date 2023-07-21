<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Categories extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
protected $fillable=
[
'Category',
'Description',
'companies_id',
];


public function Subcateg()
{
    return $this->hasMany(Subcategories::class);
}

public function Msku()
{
    return $this->hasMany(managesku::class);
}



    public function inventor()
    {
        return $this->hasMany(inventory::class);
    }
    public function productss()
    {
        return $this->hasMany(products::class);
    }
    public function Compa()
    {

        return $this->belongsTo(Companies::class, 'companies_id', 'id')->withTrashed();
    }






}
