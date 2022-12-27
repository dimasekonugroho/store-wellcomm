<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'description', 'price', 'types', 'picturePath'
    ];

    public function getCreatedAtAttribure($value)
    {
        return Carbon::parse($value)->timestamp;
    }

    public function getUpdatedAtAttribure($value)
    {
        return Carbon::parse($value)->timestamp;
    }

    // fungsi untuk mengubah nama field
    public function toArray()
    {
        $toArray = parent::toArray();
        $toArray['picturePath'] = $this->picturePath;
        return $toArray;
    }

    public function getPicturePathAttribute()
    {
        return url('') . Storage::url($this->attributes['picturePath']);
    }
    // fungsi untuk mengubah nama field
}
