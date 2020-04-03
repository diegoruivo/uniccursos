<?php


namespace Unic\Support;


use CoffeeCode\Optimizer\Optimizer;

class Seo
{
    private $optimizer;

    public function __construct()
    {
        $this->optimizer = new Optimizer();
        $this->optimizer->openGraph(
            env('APP_NAME'),
            'pt_br',
            'article'
        )->publisher(
            env('CLIENT_SOCIAL_FACEBOOK_PAGE'),
            env('CLIENT_SOCIAL_FACEBOOK_AUTHOT'),
            env('CLIENT_SOCIAL_GOOGLE_PAGE'),
            env('CLIENT_SOCIAL_GOOGLE_AUTHOR')
        )->facebook(
            env('CLIENT_SOCIAL_GOOGLE_APP')
        );
    }

    public function render(
        string $title,
        string $description,
        string $url,
        string $image,
        bool $follow = true
    )
    {
        return $this->optimizer->optimize($title, $description, $url, $image, $follow)->render();
    }
    
}