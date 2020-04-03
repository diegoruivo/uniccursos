    <div id="fh5co-blog">
        <div class="container">
            <div class="row">

                @isset($courses)

                    @foreach($courses as $course)

                        <div class="col-lg-4 col-md-4 text-center">
                            <div class="fh5co-blog animate-box">
                                <a href="{{ route('web.course', ['slug' => $course->slug]) }}"><img class="img-responsive" src="{{ url('storage/' . $course->cover) }}" alt=""></a>
                                <div class="blog-text">
                                    <h3><a href="{{ route('web.course', ['slug' => $course->slug]) }}">{{ $course->title }}</a></h3>
                                    <a href="{{ route('web.course', ['slug' => $course->slug]) }}" class="btn btn-primary">Veja Mais</a>
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
