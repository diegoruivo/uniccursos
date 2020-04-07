<?php

namespace Unic;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Unic\Support\Cropper;

class Web extends Model
{

    public function getUrlCoverAttribute()
    {
        if (!empty($this->cover)){
            return Storage::url(Cropper::thumb($this->cover, 500, 500));
        }
        return '';
    }

    public function page()
    {
        return $this->belongsTo(Page::class, 'page', 'id');
    }

    public function course_categories()
    {
        return $this->belongsTo(Course::class, 'course', 'id');
    }

    public function images()
    {
        return $this->hasMany(PageImage::class, 'page', 'id')->orderBy('cover', 'ASC');
    }

    public function cover()
    {
        $images = $this->images();
        $cover = $images->where('cover', 1)->first(['path']);

        if (!$cover){
            $images = $this->images();
            $cover = $images->first(['path']);
        }

        if (empty($cover['path']) || !File::exists('../public/storage/' . $cover['path'])) {
            return url(asset('web/assets/images/cover.jpg'));
        }

        return Storage::url(Cropper::thumb($cover['path'], 1366, 768));
    }

}
