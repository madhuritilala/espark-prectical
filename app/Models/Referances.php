<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referances extends Model
{
    use HasFactory;

    protected $table='referances';

    protected $fillable = [
        'employee_id', 'ref_name', 'ref_phone','ref_relation'
    ];
    public function referance()
    {
        return $this->belongsTo('App\Models\Employee');
    }
}
