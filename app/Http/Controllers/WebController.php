<?php

namespace Unic\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Unic\Page;
use Illuminate\Http\Request;
use Unic\PageImage;
use Unic\Support\Cropper;
use Unic\Support\Seo;

class WebController extends Controller
{
    protected $seo;

    public function __construct()
    {
        $this->seo = new Seo();
    }


}
