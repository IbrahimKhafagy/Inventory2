<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\attached;
use Illuminate\Database\Eloquent\SoftDeletes;

class stores extends Model
{
    use HasFactory, Notifiable;
    use SoftDeletes;

    protected $table = 'stores';
    protected $date = ['deleted_at'];


    protected $fillable =
    [
        'Product_name',
        'Part_No',
        'Vendor',
        'Supplier',
        'BIN',
        'QTY',
        'Reorder_QTY',
        'delivery_time',
        'per1',
        'Consumption_Rate',
        'per',
        'Price',
        'TotalPrice',
        'TotalCost',
        'managesku_id',
        'Location',
        'Cost',
        'Expected_Date',
        'Reorder_Date',
        'Other_Features',
        'Product_Manager',
        'Chain_Price',
        'cover',
        'Description',
        'Availbility',
        'categories_id',
        'subcategories_id',
        'productype_id',
        'unit_id',
        'users_id',
        'companies_id',
        'currancy_id',
        'Created_by',
        'changeQTY_at',
        'product_code',

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

    public function Com()
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

}
