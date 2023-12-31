<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Officer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'post_id',
        'status',
        'work_start_time',
        'work_end_time',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    //this is for the connection with workofdays table
    public function workDays()
    {
        return $this->hasMany(WorkDays::class);
    }

    public function appointmentsWithVisitor()
    {
        return $this->hasMany(Appointment::class)->with('visitor');
    }

    //accessing appointment table
    public function activities()
    {
        return $this->hasMany(Appointment::class);
    }

    public function activity()
    {
        return $this->belongsTo(Activity::class, 'ActivityId', 'officer_id');
    }
}
