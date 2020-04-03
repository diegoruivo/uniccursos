<nav class="fh5co-nav" role="navigation">
    <div class="top">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-right">
                    <p class="num">
                        <i class="icon-phone"></i>
                        @if (!empty($settings->telephone))
                         {{ $settings->telephone }} -
                        @endif

                        @if($settings->cell)
                             {{ $settings->cell }}
                        @endif

                            </p>
                    <ul class="fh5co-social">
                        @if (!empty($settings->twitter))
                            <li><a href="{{ $settings->twitter}}" target="_blank"><i class="icon-twitter"></i></a></li>
                        @endif
                        @if (!empty($settings->facebook))
                                <li><a href="{{ $settings->facebook}}" target="_blank"><i class="icon-facebook"></i></a></li>
                            @endif
                        @if (!empty($settings->instagram))
                                <li><a href="{{ $settings->instagram}}" target="_blank"><i class="icon-instagram"></i></a></li>
                        @endif
                        @if (!empty($settings->youtube))
                            <li><a href="{{ $settings->youtube}}" target="_blank"><i class="icon-youtube"></i></a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="top-menu">
        <div class="container">
            <div class="row">
                <div class="col-xs-1">
                    <div id="fh5co-logo"><a href="{{ route('web.home') }}"><img src="{{ url('storage/' . $settings->logo) }}"></a></div>
                </div>
                <div class="col-xs-11 text-right menu-1">
                    <ul>
                        @foreach($pages as $page)
                            <li><a href="{{ route('web.article', ['slug' => $page->slug]) }}">{{ $page->title }}</a></li>
                        @endforeach

                        <li class="btn-cta"><a href="{{ $settings->ead }}" target="_blank"><span>Acesso ao EAD</span></a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</nav>