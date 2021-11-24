<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllMedia extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'post_type',
        'number',
        'name',
        'mime_type',
        'address'
    ];

    public function videoPost()
    {
        return $this->hasOne(Video::class,'post_id','id');
    }
}
