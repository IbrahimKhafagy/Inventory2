<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class transactiontype extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'transactiontypes';
    protected $dates = ['deleted_at'];

    protected $fillable =
    [
        'name',
        'Description',
        'Created_by'

     ];


     public function transact()
     {
         return $this->hasMany(transactions::class);
     }
}
