    <div id="fh5co-contact">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-md-push-1 animate-box">

                    <div class="fh5co-contact-info">
                        <h3>Localização</h3>
                        <ul>
                            <li class="address">
                                {{ $settings->street }}, {{ $settings->number }}
                                @if($settings->complement)
                                    - {{ $settings->complement }}
                                @endif
                                <br>{{ $settings->neighborhood }}
                                <br>{{ $settings->city}}/{{ $settings->state}}
                                <br>CEP: {{ $settings->zipcode}}
                            </li>
                        </ul>
                    </div>

                </div>
                <div class="col-md-6 animate-box">
                    <div class="fh5co-contact-info">
                    <h3>Entre em contato</h3>

                    <ul>
                        @if($settings->telephone)
                            <li class="phone"><a href="tel://{{ $settings->telephone }}">+ {{ $settings->telephone }}</a></li>
                        @endif
                        @if($settings->cell)
                            <li class="phone"><a href="tel://{{ $settings->cell }}">+ {{ $settings->cell }}</a></li>
                        @endif
                        @if($settings->email)
                            <li class="email"><a href="mailto:{{ $settings->email }}">{{ $settings->email }}</a></li>
                        @endif
                        @if($settings->site)
                            <li class="url"><a href="{{ $settings->site }}">{{ $settings->site }}</a></li>
                        @endif
                    </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>