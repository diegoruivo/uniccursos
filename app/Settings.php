<?php

namespace Unic;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Unic\Support\Cropper;

class Settings extends Model
{
    protected $fillable = [
        'title',
        'description',
        'logo',
        'favico',
        'zipcode',
        'street',
        'number',
        'complement',
        'neighborhood',
        'state',
        'city',
        'telephone',
        'cell',
        'email',
        'site',
        'facebook',
        'instagram',
        'youtube',
        'twitter',
        'ead',
        'student_platform',
        'logo_admin',
        'keywords'
    ];


    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
    }


    public function getUrlLogoAttribute()
    {
        if (!empty($this->logo)){
            return Storage::url(Cropper::thumb($this->logo, 500, 500));
        }
        return '';
    }

    public function getUrlFavicoAttribute()
    {
        if (!empty($this->favico)){
            return Storage::url(Cropper::thumb($this->favico, 500, 500));
        }
        return '';
    }

    public function getUrlLogoadminAttribute()
    {
        if (!empty($this->logoadmin)){
            return Storage::url(Cropper::thumb($this->logoadmin, 500, 500));
        }
        return '';
    }


}
