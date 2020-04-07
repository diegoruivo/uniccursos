<?php

namespace Unic;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Unic\Support\Cropper;

class Course extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'cover',
        'slug',
        'position',
        'course'
    ];




    public function course_category()
    {
        return $this->belongsTo(CourseCategory::class, 'course', 'id');
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }

    public function getUrlCoverAttribute()
    {
        if (!empty($this->cover)){
            return Storage::url(Cropper::thumb($this->cover, 500, 500));
        }
        return '';
    }


}
