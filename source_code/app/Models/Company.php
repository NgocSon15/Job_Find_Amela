<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Job;
use App\Models\Field;
use App\Models\City;
use App\Models\CompanySize;



class Company extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $table = 'companies';

    public function jobs()
    {
        return $this->hasMany(Job::class, 'id', 'id');
    }

    public function field()
    {
        return $this->belongsTo(Field::class, 'field_id', 'field_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'city_id');
    }

    public function companySize()
    {
        return $this->belongsTo(CompanySize::class, 'size_id', 'size_id');
    }
}
