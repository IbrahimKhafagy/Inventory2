<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



    class Transaction extends Model
    {
        protected $fillable = [
            'QTY',
            'delivery_QTY',
            'From_inv',
            'To_inv',
            'Description',
            'Created_by',
            'users_id',
            'transactiontypes_id',
            'products_id',
            'inventory_id'
        ];

        public function transactiontype()
        {
            return $this->belongsTo(Transactiontype::class);
        }

        public function product()
        {
            return $this->belongsTo(Product::class);
        }

        public function inventory()
        {
            return $this->belongsTo(Inventory::class);
        }

        public function user()
        {
            return $this->belongsTo(User::class);
        }
    }

