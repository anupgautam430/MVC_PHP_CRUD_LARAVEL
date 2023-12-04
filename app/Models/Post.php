<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'status'
    ];

    public function officers()
    {
        return $this->hasMany(Officer::class, 'post_id');
    }
}
