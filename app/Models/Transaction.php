<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'product_id', 'user_id', 'quantity', 'total', 'status', 'payment_url'
    ];

    // relasi tabel product
    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    // relasi tabel user
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function getCreatedAtAttribure($value)
    {
        return Carbon::parse($value)->timestamp;
    }

    public function getUpdatedAtAttribure($value)
    {
        return Carbon::parse($value)->timestamp;
    }
}
