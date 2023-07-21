<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\attached;
use Illuminate\Database\Eloquent\SoftDeletes;
use SebastianBergmann\CodeCoverage\Report\Xml\Unit;
use App\Enums\InventoryType;


class inventory extends Model
{
    use HasFactory, Notifiable;
    use SoftDeletes;

    protected $table = 'inventory';
    protected $date = ['deleted_at'];


    protected $fillable =
    [
       'inv_name',
       'manager',
       'Phone',
       'Email',
       'Inventory_Type',
       'address',
       'users_id',
       'QTY',
       'companies_id',
        'Created_by',


    ];
    protected $casts = [
        'Inventory_Type' => InventoryType::class
        ];

    public function Skus()
    {
        return $this->belongsTo(managesku::class, 'managesku_id', 'id')->withTrashed();
    }

    public function Categ()
    {

        return $this->belongsTo(Categories::class, 'categories_id', 'id')->withTrashed();
    }
    public function Subcat()
    {

        return $this->belongsTo(Subcategories::class, 'subcategories_id', 'id')->withTrashed();
    }

    public function Uni()
    {

        return $this->belongsTo(unitt::class, 'unit_id', 'id')->withTrashed();
    }


    public function curr()
    {

        return $this->belongsTo(currancy::class, 'currancy_id', 'id');
    }

    public function Compa()
    {

        return $this->belongsTo(Companies::class, 'companies_id', 'id')->withTrashed();
    }
    public function Type()
    {
        return $this->belongsTo(productype::class, 'productype_id', 'id')->withTrashed();
    }


    public function attach(){

        return $this->hasMany(attached::class );
    }





    public function pros()//products table
{
    return $this->hasMany(products::class);
}

public function useree()
{
//return $this->belongsTo('App\Categories');
    return $this->belongsTo(User::class,'users_id','id');


}

public function notifi()//products table
{
    return $this->hasMany(notification::class);
}



}
