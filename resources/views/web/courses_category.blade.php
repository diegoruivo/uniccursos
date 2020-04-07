@extends('web.master.master')

@section('content')

        <header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner"
                style="background-image:url({{ url('storage/' . $cover->path) }});" data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 text-center">
                        <div class="display-t">
                            <div class="display-tc animate-box" data-animate-effect="fadeIn">
                                <h1>{{ $courses_category->title }}</h1>
                                <h2>Cursos</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>



    <div id="fh5co-blog">
        <div class="container">
            <div class="row">

                @isset($courses_list)

                    @foreach($courses_list as $course)

                        <div class="col-lg-3 col-md-3 text-center">
                            <div class="fh5co-blog animate-box">
                                <a href="{{ route('web.course', ['slug' => $course->slug]) }}"><img class="img-responsive" src="{{ url('storage/' . $course->cover) }}" alt=""></a>
                                <div class="blog-text">
                                    <h3><a href="{{ route('web.course', ['slug' => $course->slug]) }}">{{ $course->title }}</a></h3>
                                    <a href="{{ route('web.course', ['slug' => $course->slug]) }}" class="btn btn-primary">Veja o Curso</a>
                                </div>
                            </div>
                        </div>
                    @if(($loop->index + 1) % 4 === 0)
                        <div style="width: 100%; float:left; height:1px;"></div>
                    @endif

                    @endforeach

                @endisset

            </div>
        </div>
    </div>


@endsection