<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class contactlist extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=
             [
                'companies_id',
                'contact_type',
                'Person_Name',
                'Company_Name',
                'Position',
                'Phone',
                'Email',
                'Address',
                'product',
                'product_type',
                'Created_by'
            ];
             protected $table = 'contactlist';
             protected $dates = ['deleted_at'];
}
