<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experiance extends Model
{
    use HasFactory;

    protected $table='experiances';

    protected $fillable = [
        'employee_id', 'company_address', 'exp_designation','joining_date_from','joining_date_to', 'technology', 'type','notice_period','exp_ctc', 'current_ctc', 'preferance_location','department'
    ];

    public function experiance()
    {
        return $this->belongsTo('App\Models\Employee');
    }
}
