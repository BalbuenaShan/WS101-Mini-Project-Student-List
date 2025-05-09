<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // Define the fillable fields for mass assignment
    protected $fillable = ['name', 'course', 'age', 'gender'];
}