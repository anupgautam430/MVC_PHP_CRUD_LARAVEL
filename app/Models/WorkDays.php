<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkDays extends Model
{
    use HasFactory;
    protected $fillable = [
        'officer_id',
        'day_of_week'
    ];

    //this is for the connection between officer and this controller
    public function officer()
    {
        return $this->belongsTo(Officer::class);
    }
}
