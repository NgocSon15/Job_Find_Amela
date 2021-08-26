<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Queue\Jobs\Job;

class Apply extends Model
{
    use HasFactory;
    protected $table = 'applies';
//    public function job()
//    {
//        return $this->hasOne(Job::class, 'id','job_id');
//    }
}
