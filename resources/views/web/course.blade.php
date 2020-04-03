@extends('web.master.master')

@section('content')

    @if($show_page)
    <header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner"
            style="background-image:url({{ url('storage/' . $cover->path) }});" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="display-t">
                        <div class="display-tc animate-box" data-animate-effect="fadeIn">
                            <h1>{{ $course->title }}</h1>
                            <h2>{{ $course->subtitle }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    @endif

    <div id="fh5co-blog">
        <div class="container">

            <div class="row">

                <div class="col-md-6">
                @if($course->description)
                <div class="col-12">
                   <img class="img-responsive" src="{{ url('storage/' . $course->cover) }}" alt="">

                </div>
                @endif
                </div>


                <div class="col-md-6">
                    @if($course->description)
                        <div class="col-12">
                            <div class="blog-text">
                                <p>{!! $course->description !!}</p>
                            </div>
                        </div>
                    @endif
                </div>






            </div>
        </div>
    </div>

@endsection


