<?php

namespace App\Model\user;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class jargon extends Model
{
    public function tags()
    {
        //return $this->belongsToMany('App\Model\user\jargon_tag','jorgon_tags')->withTimestamps();
        return $this->belongsToMany(jargon::class, 'jargon_tags', 'tag_id', 'jargons_id')->withPivot('created_at');
    }

    public function categories()
    {
        //return $this->belongsToMany('App\Model\user\category','category_jorgon')->withTimestamps();
        return $this->belongsToMany(jargon::class, 'category_jargon', 'category_id', 'jargons_id')->withPivot('created_at');
    }

    public function getRouteKeyName()
    {
    	return 'jorgon_slug';
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }

    public function likes()
    {
        return $this->hasMany('App\Model\user\like');
    }

    public function getSlugAttribute($value)
    {
        return route('jorgon',$value);
    }
}
