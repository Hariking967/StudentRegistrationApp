<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    // @use HasFactory<\Database\Factories\StudentFactory
    use HasFactory;
    protected $fillable = [
        'rollno',
        'name',
        'dob',
        'email',
        'officialemail',
        'contact',
        'dept',
        'passout'
    ];
    public function getRouteKeyName()
    {
        return 'rollno';
    }
}
