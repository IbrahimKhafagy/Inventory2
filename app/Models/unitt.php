<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class unitt extends Model
{

    use HasFactory;
    use SoftDeletes;
    protected $table = 'unit';
    protected $dates = ['deleted_at'];
    protected $fillable=[
                        'unit_name',
                        'Description',

                        ];
}
