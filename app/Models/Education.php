<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Education extends Model
{
    use HasFactory;

    protected $table='educations';

    protected $fillable = [
        'employee_id', 'course_name', 'univercity','passing_year','percentage'
    ];

    public function education()
    {
        return $this->belongsTo('App\Models\Employee');
    }
}
