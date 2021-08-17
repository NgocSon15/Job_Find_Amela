<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use HasFactory;
    protected $primaryKey = 'company_id';
    public $timestamps = false;
    public function jobs()
    {
        return $this->hasMany(Job::class, 'company_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }
}
