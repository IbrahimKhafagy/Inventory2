<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class currancy extends Model
{
    use HasFactory;
    protected $fillable=['name',];
protected $table = 'currancy';



public function invent()
{
    return $this->hasMany(inventory::class);
}


public function mskuss()
{
    return $this->hasOne(managesku::class);
}



}
