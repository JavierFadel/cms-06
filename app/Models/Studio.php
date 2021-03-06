<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studio extends Model
{
    use HasFactory;

    public function branch()
    {
    	return $this->belongsTo('App\Models\Branch');
    }

    public function schedules()
    {
    	return $this->hasMany('App\Models\Schedule');
    }

    protected $fillable = [
    	'name',
    	'branch_id',
    	'basic_price',
    	'additional_friday_price',
    	'additional_saturday_price',
    	'additional_sunday_price',
    ];
}
