<?php

namespace Unic;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Unic\Support\Cropper;

class Page extends Model
{

    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'slug',
        'position'
    ];

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = str_slug($value);
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
            return url(asset('backend/assets/images/cover.jpeg'));
        }

        return Storage::url(Cropper::thumb($cover['path'], 1366, 768));
    }



}
