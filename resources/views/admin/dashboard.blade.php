@extends('admin.master.master')

@section('content')

    <div style="flex-basis: 100%;">
        <section class="dash_content_app">
            <header class="dash_content_app_header">
                <h2 class="icon-tachometer">Painel de Controle</h2>
            </header>

            <div class="dash_content_app_box">
                <section class="app_dash_home_stats">

                    <article class="blog radius">
                        <h4 class="icon-file-text"><a href="{{ route('admin.pages.index') }}" class="text-green">Páginas</a></h4>
                        <ol style="padding:10px;">
                        @foreach($pages as $page)
                                <li style="list-style-position: inside; padding:10px; zoom: 70%;"><a href="{{ route('admin.pages.edit', ['page' => $page->id]) }}"><big><big>{{ $page->title }}</big></big></a></li>
                        @endforeach
                        </ol>
                    </article>

                    <article class="control radius">
                        <h4 class="icon-graduation-cap"><a href="{{ route('admin.courses.index') }}" class="text-green">Cursos</a></h4>
                        <ol style="padding:10px;">
                        @foreach($courses as $course)
                                <li style="list-style-position: inside; padding:10px; zoom: 70%;"><a href="{{ route('admin.courses.edit', ['course' => $course->id]) }}"><big><big>{{ $course->title }}</big></big></a></li>
                        @endforeach
                        </ol>
                    </article>

                </section>
            </div>
        </section>


    </div>

@endsection