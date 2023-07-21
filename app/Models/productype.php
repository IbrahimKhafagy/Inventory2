<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class productype extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=['name','Description',];
    protected $dates = ['deleted_at'];
    protected $table = 'productype';
}
