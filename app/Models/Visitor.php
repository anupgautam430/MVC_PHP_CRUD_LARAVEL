<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;

    protected $fillable = [
        'Name',
        'Mobile_no',
        'Email_Address',
        'Status'
    ];

    public function appointmentsWithOfficers()
    {
        return $this->hasMany(Appointment::class)->with('officer');
    }

    //accessing appointment table
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
