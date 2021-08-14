<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

<<<<<<< HEAD
    protected $table = 'jobs';
=======
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'company_id');
    }
>>>>>>> b797e6d71720a7a2217f7412434a083566cd2f9f
}
