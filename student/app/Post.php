<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable=[
        'title',
        'slug',
        'status',
        'content',
        'category_id',
        'user_id',
        'published_at'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function getPublishedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function setPublishedAtAttribute($value)
    {
        $date = Carbon::parse($value)->format('Y-m-d');
        $now = Carbon::now();
        $date = Carbon::parse($date)->addHours($now->hour)->addMinutes($now->minute);
        $this->attributes['published_at'] = $date->format('Y-m-d H:i');
    }

    public function getTitleAttribute($value)
    {
        return ucfirst($value);
}

    public function setCategoryIdAttribute($value)
    {
        if($value == 0)
            $this->attributes['category_id'] = null;
        else
            $this->attributes['category_id'] = $value;
    }

    public function setUserIdAttribute($value)
    {
    if($value == 0)
            $this->attributes['user_id'] = null;
        else
            $this->attributes['user_id'] = $value;
    }

    public function setSlugAttribute($value)
    {
        if($value == 0)
            $this->attributes['slug'] = (empty($this->title)? str_slug($this->title) : 'slug');
        else
            $this->attributes['slug'] = str_slug($value);
    }

    public function hasTag($tagId)
    {
        foreach($this->tags as $tag)
        {
            if($tag->id == $tagId) return true;
        }

        return false;
    }
}
