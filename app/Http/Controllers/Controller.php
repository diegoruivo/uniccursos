<?php

namespace Unic\Http\Controllers;

use Unic\Support\Message;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Unic\Support\Seo;
use Unic\User;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    protected $seo;

    public function __construct()
    {
        $this->seo = new Seo();
    }

}
