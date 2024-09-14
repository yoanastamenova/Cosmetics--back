<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\order;

class product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    public function order()
    {
        return $this->hasMany(order::class, 'product_id');
    }
}
