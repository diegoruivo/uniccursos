    <div id="fh5co-contact">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-md-push-1 animate-box">

                    <div class="fh5co-contact-info">
                        <h3>Informações de Contato</h3>
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
                <div class="col-md-6 animate-box">
                    <h3>Entre em contato</h3>
                    <form action="#">
                        <div class="row form-group">
                            <div class="col-md-12">
                                <!-- <label for="fname">First Name</label> -->
                                <input type="text" id="fname" class="form-control" placeholder="Seu nome completo">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <!-- <label for="email">Email</label> -->
                                <input type="text" id="email" class="form-control" placeholder="Seu endereço de e-mail">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <!-- <label for="subject">Assunto</label> -->
                                <input type="text" id="subject" class="form-control" placeholder="Assunto da mensagem">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <!-- <label for="message">Message</label> -->
                                <textarea name="message" id="message" cols="30" rows="6" class="form-control" placeholder="Escreva sua mensagem aqui"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Enviar Mensagem" class="btn btn-primary">
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>