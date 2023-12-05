<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $fillable = [
        'visitor_id', 
        'officer_id', 
        'appointment_time', 
        'status'];

    public function visitor()
    {
        return $this->belongsTo(Visitor::class);
    }

    public function officer()
    {
        return $this->belongsTo(Officer::class);
    }
}
