<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $fillable = [
        'officer_id',
        'visitor_id',
        'name',
        'status',
        'type',
        'date',
        'start_time',
        'end_time',
    ];

    protected $dates = ['added_on', 'last_updated_on'];

    public function officer()
    {
        return $this->belongsTo(Officer::class);
    }

    public function visitor()
    {
        return $this->belongsTo(Visitor::class);
    }
    public function activity()
    {
        return $this->belongsTo(Activity::class, 'ActivityId', 'officer_id');
    }


}
