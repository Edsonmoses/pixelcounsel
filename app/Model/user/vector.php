<?php

namespace App\Model\user;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class vector extends Model
{
    //protected $fillable = ['vectors_title', 'vectors_slug', 'vectors_body', 'vectors_type', 'contributor', 'vectors_image'];


    public function getRouteKeyName()
    {
    	return 'vectors_slug';
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }
    public function getSlugAttribute($value)
    {
        return route('vector',$value);
    }
}
