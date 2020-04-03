<footer id="fh5co-footer" role="contentinfo">
    <div class="container">
        <div class="row row-pb-md">


            <div class="col-md-12 col-sm-12 col-xs-12">
                <div style="text-align: center;"><a href="{{ route('web.home') }}"><img src="{{ url('storage/' . $settings->logoadmin) }}"></a></div>

            </div>
        </div>

        <div class="row copyright">
            <div class="col-md-12 text-center">
                <p>
                    <small class="block">2020. {{ $settings->title }}</small>
                </p>
                <p>
                <ul class="fh5co-social-icons">
                    @if (!empty($settings->twitter))
                        <li><a href="{{ $settings->twitter}}"><i class="icon-twitter"></i></a></li>
                    @endif
                    @if (!empty($settings->facebook))
                        <li><a href="{{ $settings->facebook}}"><i class="icon-facebook"></i></a></li>
                    @endif
                    @if (!empty($settings->instagram))
                        <li><a href="{{ $settings->instagram}}"><i class="icon-instagram"></i></a></li>
                    @endif
                    @if (!empty($settings->youtube))
                        <li><a href="{{ $settings->youtube}}"><i class="icon-youtube"></i></a></li>
                    @endif
                </ul>
                </p>
                <p>
                    <br><small class="block">Desenvolvido por <a href="https://ruivooffice.com.br/" target="_blank">Ruivo Office</a></small>
                </p>

            </div>
        </div>

    </div>
</footer>