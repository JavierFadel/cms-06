<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    public function studio()
    {
    	return $this->belongsTo('App\Models\Studio');
    }

    public function movie()
    {
    	return $this->belongsTo('App\Models\Movie');
    }

    protected $fillable = [
    	'movie_id',
    	'studio_id',
    	'start',
    	'end',
    	'price'
    ];
}
