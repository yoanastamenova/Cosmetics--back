<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Products;

class Orders extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_date',
    ];


    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function products()
    {
        return $this->hasOne(products::class);
    }
}