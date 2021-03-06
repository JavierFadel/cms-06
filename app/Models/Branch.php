<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    public function studios()
    {
    	return $this->hasMany('App\Models\Studio');
    }

    protected $fillable = [
    	'name'
    ];
}
