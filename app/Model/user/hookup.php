<?php

namespace App\Model\user;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class hookup extends Model
{
    public function tags()
    {
        return $this->belongsToMany(hookup::class, 'hookup_tags', 'tag_id', 'hookup_id')->withPivot('created_at');
    }

    public function categories()
    {
    	return $this->belongsToMany('App\Model\user\category','category_hookup')->withTimestamps();;
    }

    public function getRouteKeyName()
    {
    	return 'job_slug';
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
        return route('hookup',$value);
    }
}
