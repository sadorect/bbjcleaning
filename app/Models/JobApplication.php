<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'gender',
        'has_vehicle',
        'employment_type',
        'can_work_in_canada',
        'available_days',
        'preferred_hours',
        'weekend_availability',
        'has_cleaning_experience',
        'years_experience',
        'resume_path',
        'cover_letter_path',
        'additional_notes',
        'status'
    ];

    protected $casts = [
        'available_days' => 'array',
        'has_vehicle' => 'boolean',
        'can_work_in_canada' => 'boolean',
        'weekend_availability' => 'boolean',
        'has_cleaning_experience' => 'boolean'
    ];
}
