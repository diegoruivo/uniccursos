    <div id="fh5co-blog">
        <div class="container">
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
