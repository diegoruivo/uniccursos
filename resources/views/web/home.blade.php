
    <header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url({{ url('storage/' . $cover->path) }});" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="display-t">
                        <div class="display-tc animate-box" data-animate-effect="fadeIn">
                            <h1>{{ $page->subtitle }}</h1>
                            <h2>{!! $page->description !!}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div id="fh5co-project">
        <div class="container">
            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                    <h2>Conheça nossos cursos</h2>
                    <p>A <b>UNICCURSOS</b> tem um vasto portfólio de cursos
                        <br>para você se tornar um excelente profissional</p>
                </div>
            </div>
        </div>
        <div class="container-fluid proj-bottom">
            <div class="row">

                @isset($course_categories)

                    @foreach($course_categories as $category)

                        <div class="col-lg-3 col-md-3 text-center">
                            <div class="fh5co-blog animate-box">
                                <a href="{{ route('web.courses_category', ['slug' => $category->slug]) }}"><img class="img-responsive" src="{{ url('storage/' . $category->cover) }}" alt=""></a>
                                <div class="blog-text">
                                    <h3><a href="{{ route('web.courses_category', ['slug' => $category->slug]) }}">{{ $category->title }}</a></h3>
                                    <a href="{{ route('web.courses_category', ['slug' => $category->slug]) }}" class="btn btn-primary">Veja os Cursos</a>
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
