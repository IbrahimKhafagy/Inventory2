<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class team extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable=
    [
        'Name',
        'Position',
        'Email',
        'Phone',
        'companies_id',
        'companytype_id',
        'users_id',
        'Created_by'

    ];
    protected $table = 'team';
}
