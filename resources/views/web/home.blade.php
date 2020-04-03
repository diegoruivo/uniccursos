
    <header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url(web/assets/images/img_bg_1.jpg);" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="display-t">
                        <div class="display-tc animate-box" data-animate-effect="fadeIn">
                            <h1>{{ $page->subtitle }}</h1>
                            <h2>{!! $page->description !!}</h2>
                            <p><a class="btn btn-primary btn-lg btn-learn" href="#">Acesse os Cursos</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div id="fh5co-counter" class="fh5co-counters">
        <div class="container">
            <div class="row">
                <div class="col-md-3 text-center animate-box">
                    <span class="fh5co-counter js-counter" data-from="0" data-to="40356" data-speed="5000" data-refresh-interval="50"></span>
                    <span class="fh5co-counter-label">Students</span>
                </div>
                <div class="col-md-3 text-center animate-box">
                    <span class="fh5co-counter js-counter" data-from="0" data-to="30290" data-speed="5000" data-refresh-interval="50"></span>
                    <span class="fh5co-counter-label">Courses</span>
                </div>
                <div class="col-md-3 text-center animate-box">
                    <span class="fh5co-counter js-counter" data-from="0" data-to="2039" data-speed="5000" data-refresh-interval="50"></span>
                    <span class="fh5co-counter-label">Instructor</span>
                </div>
                <div class="col-md-3 text-center animate-box">
                    <span class="fh5co-counter js-counter" data-from="0" data-to="997585" data-speed="5000" data-refresh-interval="50"></span>
                    <span class="fh5co-counter-label">Earnings</span>
                </div>
            </div>
        </div>
    </div>


    <div id="fh5co-project">
        <div class="container">
            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                    <h2>Conheça alguns de nossos cursos</h2>
                    <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
                </div>
            </div>
        </div>
        <div class="container-fluid proj-bottom">
            <div class="row">

                @isset($courses)

                    @foreach($courses as $course)

                        <div class="col-lg-4 col-md-4">
                            <div class="fh5co-blog animate-box">
                                <a href="#"><img class="img-responsive" src="{{ url('storage/' . $course->cover) }}" alt=""></a>
                                <div class="blog-text">
                                    <h3>{{ $course->title }}</a></h3>
                                    <p>{{ $course->subtitle }}</p>
                                    <a href="" class="btn btn-primary">Read More</a>
                                </div>
                            </div>
                        </div>

                        @if(($loop->index + 1) % 3 === 0)
                            <div style="width: 100%; float:left; height:1px;"></div>
                        @endif

                    @endforeach

                @endisset

            </div>
        </div>

    </div>
