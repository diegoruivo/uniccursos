<?php

namespace Unic\Http\Controllers\Web;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Unic\Course;
use Unic\Http\Controllers\Controller;
use Unic\Page;
use Unic\PageImage;
use Unic\Settings;
use Unic\Support\Cropper;

class WebController extends Controller
{

    public function home()
    {

        $pages = Page::orderBy('position', 'ASC')->get();
        $settings = Settings::orderBy('id', 'ASC')->limit(1)->first();

        $head = $this->seo->render(
            env('APP_NAME') . 'Home',
            'Descriçao de' . env('APP_NAME'),
            url('/'),
            asset('images/cover.jpg')
        );

        return view('web.home',[
            'pages' => $pages,
            'head' => $head,
            'settings' => $settings,
        ]);

    }

    public function courses()
    {
        $courses = Course::all();
        $pages = Page::orderBy('position', 'ASC')->get();
        $settings = Settings::orderBy('id', 'ASC')->limit(1)->first();

        $head = $this->seo->render(
            env('APP_NAME') . 'Cursos',
            'Descriçao de Cursos' . env('APP_NAME'),
            route('web.courses'),
            asset('images/cover.jpg')
        );

        $content_home = view('web.courses');

        return view('web.courses', [
            'courses' => $courses,
            'pages' => $pages,
            'head' => $head,
            'settings' => $settings,
            'content_home' => $content_home
        ]);
    }

    public function course($uri)
    {
        $course = Course::where('slug', $uri)->first();
        $page = Page::where('slug', 'cursos')->first();
        $cover = PageImage::where('page', $page->id)->where('cover', 1)->first(['path']);
        $pages = Page::orderBy('position', 'ASC')->get();
        $settings = Settings::orderBy('id', 'ASC')->limit(1)->first();

        return view('web.course', [
            'course' => $course,
            'show_page' => ($page->slug == 'cursos'),
            'page' => $page,
            'cover' => $cover,
            'pages' => $pages,
            'settings' => $settings
        ]);
    }


    public function article($uri)
    {
        $page = Page::where('slug', $uri)->first();
        $pages = Page::orderBy('position', 'ASC')->get();
        $images = PageImage::all()->where('cover', !1)->where('page', $page->id);
        $cover = PageImage::where('page', $page->id)->where('cover', 1)->first(['path']);
        $settings = Settings::orderBy('id', 'ASC')->limit(1)->first();
        $courses = Course::all();


//        $head = $this->seo->render(
//            env('APP_NAME') . '-' . $page->title,
//            $page->subtitle,
//            route('web.article', $page->slug),
//            Storage::url(Cropper::thumb($page->cover, 1200, 628))
//        );


        return view('web.article', [
//            'head' => $head,
            'page' => $page,
            'pages' => $pages,
            'images' => $images,
            'cover' => $cover,
            'settings' => $settings,
            'courses' => $courses,
            'show_home' => ($page->slug == 'home'),
            'show_courses' => ($page->slug == 'cursos'),
            'show_contact' => ($page->slug == 'contato')
        ]);

    }

    public function contact()
    {

        $pages = Page::orderBy('position', 'ASC')->get();
        $settings = Settings::orderBy('id', 'ASC')->limit(1)->first();

        $head = $this->seo->render(
            env('APP_NAME') . 'Contato',
            'Descriçao de Contato' . env('APP_NAME'),
            route('web.contact'),
            asset('images/cover.jpg')
        );

        return view('web.contact',[
            'pages' => $pages,
            'head' => $head,
            'settings' => $settings
        ]);
    }



}
