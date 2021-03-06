<?php

use App\Models\Branch;
use App\Models\Studio;
use App\Models\Movie;
use App\Models\Schedule;

// Getting branch name from views.
function getBranchName($id)
{
	return Branch::findOrFail($id)->name;
}

// Getting studio name from views.
function getStudioName($id)
{
	return Studio::findOrFail($id)->name;
}

// Getting movie name from views.
function getMovieName($id)
{
	return Movie::findOrFail($id)->name;
}

// Getting movie's image from views.
function getImageUrl($id)
{
	return Movie::findOrFail($id)->picture_url;
}

// Converting datetime from views.
function convertDateToTime($date)
{
	return date('D, H:i T', strtotime($date));
}