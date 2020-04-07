@extends('web.master.master')

@section('content')

    @if(!$show_home)
    <header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner"
            style="background-image:url({{ url('storage/' . $cover->path) }});" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="display-t">
                        <div class="display-tc animate-box" data-animate-effect="fadeIn">
                            <h1>{{ $page->title }}</h1>
                            <h2>{{ $page->subtitle }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    @endif

    @if($show_home)
        @include('web.home')
    @endif

    <div id="fh5co-blog">
        <div class="container">

            <div class="row">

                @if($page->description)
                <div class="col-12">
                    <div class="blog-text">
                            @if(!$show_home)
                            <p>{!! $page->description !!}</p>
                            @endif
                    </div>
                </div>
                @endif

                <div class="col-12">
                    @foreach($images as $image)

                        <div class="col-md-4 col-sm-6 fh5co-project animate-box" data-animate-effect="fadeIn">
                            <a href="{{ url('storage/' . $image->path) }}" class="image-popup"><img src="{{ url('storage/' . $image->path) }}" class="img-responsive">
                            </a>
                        </div>

                    @endforeach
                </div>


                @if($show_courses)
                    @include('web.courses')
                @endif


                @if($show_contact)
                    @include('web.contact')
                @endif


            </div>
        </div>
    </div>



@endsection


