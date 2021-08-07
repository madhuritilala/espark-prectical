<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Employee extends Model
{
    use HasFactory;

    protected $table='employees';

    protected $fillable = [
        'first_name', 'last_name', 'designation','address_1','address_2','email','city','state', 'zipcode', 'birth_date','relation_status','gender','phone','language'

    ];

    public function edu()
    {
        return $this->hasMany('App\Models\Education');
    }
    public function ref()
    {
        return $this->hasMany('App\Models\Referances');
    }
    public function exp()
    {
        return $this->hasMany('App\Models\Experiance');
    }
}
