<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class companyreq extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable=['Name' ,
    'Position',
    'Phone',
    'Email',
    'Company_Name' ,
    'Co_Address',
    'Co_Website',
    'Business_Activity',
    'status_id',

];

    public function Status()
    {
    //return $this->belongsTo('App\Categories');
     return $this->belongsTo(status::class,'status_id','id');


    }
}
