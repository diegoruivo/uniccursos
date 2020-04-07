<?php

namespace Unic\Http\Controllers\Web;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Unic\Course;
use Unic\CourseCategory;
use Unic\Http\Controllers\Controller;
use Unic\Page;
use Unic\PageImage;
use Unic\Settings;
use Unic\Support\Cropper;

class WebController extends Controller
{

    public function index()
    {
        return redirect('/page/home');
    }

    public function home()
    {
        $page = Page::where('slug', 'home')->first();
        $pages = Page::orderBy('position', 'ASC')->get();
        $settings = Settings::orderBy('id', 'ASC')->limit(1)->first();
        $course_categories = CourseCategory::orderBy('position', 'ASC')->get();


        $head = $this->seo->render(
            env('APP_NAME') . 'Home',
            'Descriçao de' . env('APP_NAME'),
            url('/'),
            asset('images/cover.jpg')
        );

        return view('web.home',[
            'page' => $page,
            'pages' => $pages,
            'head' => $head,
            'settings' => $settings,
            'course_categories' => $course_categories
        ]);

    }



    public function courses($uri)
    {
        $course_categories = CourseCategory::orderBy('position', 'ASC')->get();
        $courses = Course::all();
        $page = Page::where('slug', 'cursos')->first();
        $cover = PageImage::where('page', $page->id)->where('cover', 1)->first(['path']);
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
            'course_categories' => $course_categories,
            'courses' => $courses,
            'page' => $page,
            'cover' => $cover,
            'pages' => $pages,
            'head' => $head,
            'settings' => $settings,
            'content_home' => $content_home
        ]);
    }

    public function courses_category($uri)
    {
        $courses_category = CourseCategory::where('slug', $uri)->first();
        $courses_list = Course::where('course', $courses_category->id)->get();
        $page = Page::where('slug', $uri)->first();
        $pages = Page::orderBy('position', 'ASC')->get();

        $page_courses = Page::where('slug', 'cursos')->first();
        $cover = PageImage::where('page', $page_courses->id )->where('cover', 1)->first(['path']);


        $settings = Settings::orderBy('id', 'ASC')->limit(1)->first();

        return view('web.courses_category', [
            'courses_category' => $courses_category,
            'courses_list' => $courses_list,
            'page' => $page,
            'cover' => $cover,
            'pages' => $pages,
            'settings' => $settings
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
        $course_categories = CourseCategory::orderBy('position', 'ASC')->get();

        return view('web.article', [
            'page' => $page,
            'pages' => $pages,
            'images' => $images,
            'cover' => $cover,
            'settings' => $settings,
            'courses' => $courses,
            'course_categories' => $course_categories,
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
