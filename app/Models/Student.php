<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // Fillable fields - allow mass assignment for these columns
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'user_id' // optional if each student belongs to a user (e.g. for user-student relationship)
    ];

    // Optional: if each student belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
