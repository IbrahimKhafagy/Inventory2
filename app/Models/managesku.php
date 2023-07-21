<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class managesku extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'managesku';
    protected $dates = ['deleted_at'];
    protected $fillable=
    [
        'SKU',
        'Part_No',
        'Chainnest_Price',
        'Availablity',
        'Description',
        'Created_by',



        //'currancy_id',



    ];


    public function curr()
{
    return $this->belongsTo(currancy::class,'currancy_id','id');


}


    public function Inven()
    {

        return $this->belongsTo(inventory::class, 'inventory_id', 'id');
    }

    public function Inventory()
    {

        return $this->hasMany(inventory::class,'managesku_id' ,'id');
    }

    public function cate()
    {

        return $this->belongsTo(Categories::class, 'categories_id', 'id');
    }



}
