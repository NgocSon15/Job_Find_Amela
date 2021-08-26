<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;


class Apply extends Model
{
    use HasFactory;
    protected $table = 'applies';


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

}
