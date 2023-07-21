<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\inventory;
use App\Models\Companies;
class attached extends Model
{
    use HasFactory;
    protected $table = 'attached';
    protected $fillable =['image', 'inventory_id', 'companies_id', 'Created_by'];

    public function invent()
    {
        return $this->belongsTo(inventory::class, 'inventory_id', 'id');
    }

//// for company
    public function cop()
    {
        return $this->belongsTo(Companies::class ,'companies_id','id');
    }
}
