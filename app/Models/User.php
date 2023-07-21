<?php

namespace App\Models;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;




class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes ,HasRoles;

    public function Compan()
    {
    //return $this->belongsTo('App\Categories');
        return $this->belongsTo(Companies::class,'companies_id','id');


    }

    public function invent()
    {
        return $this->hasOne(inventory::class);
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */




    protected $fillable = [
        'name',
        'email',
        'password',
        'companies_id',
        'Status',
        'Phone',
        'adminchain',

    ];


    protected $dates = ['deleted_at'];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];




    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'roles_name' => 'array',

    ];
}
