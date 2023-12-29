<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    protected $fillable = [
        'ActivityId',
        'visitor_id',
        'officer_id',
        'Type',
        'Start_Date',
        'Start_Time',
        'End_Date',
        'End_Time',
        'Status',
        ];
    protected $primaryKey = 'ActivityId';
    public function visitor()
    {
        return $this->belongsTo(Visitor::class);
    }

    public function officer()
    {
        return $this->belongsTo(Officer::class);
    }
}
