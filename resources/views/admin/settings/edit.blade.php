@extends('admin.master.master')

@section('content')


    <section class="dash_content_app">

        <header class="dash_content_app_header">

            <h2 class="icon-user">Configurações do Site</h2>
            <div class="dash_content_app_header_actions">
                <nav class="dash_content_app_breadcrumb">
                    <ul>
                        <li><a href="{{ route('admin.home') }}">Painel de Controle</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="{{ route('admin.users.index') }}">Configurações do Site</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <div class="dash_content_app_box">
            <div class="nav">

                @if($errors->all())
                    @foreach($errors->all() as $error)
                        @message(['color' => 'orange'])
                        <p class="icon-asterisk">{{ $error }}</p>
                        @endmessage
                    @endforeach
                @endif

                @if(session()->exists('message'))

                    @message(['color' => session()->get('color')])
                    <p class="icon-asterisk">{{ session()->get('message') }}</p>
                    @endmessage

                @endif


                <ul class="nav_tabs">
                    <li class="nav_tabs_item">
                        <a href="#data" class="nav_tabs_item_link active">Configurações do Site</a>
                    </li>
                </ul>

                <form class="app_form" action="{{ route('admin.settings.update', ['setting' => $setting->id]) }}"
                      method="post" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    {{-- ### Dados Cadastrais ### --}}
                    <div class="nav_tabs_content">
                        <div id="data">

                            <label class="label">
                                <span class="legend">*Título do Site:</span>
                                <input type="text" name="title" placeholder="Título"
                                       value="{{ old('title') ?? $setting->title }}" required/>
                            </label>

                            <label class="label">
                                <span class="legend">Descrição:</span>
                                <textarea name="description" cols="30" rows="4">{{ old('description') ?? $setting->description }}</textarea>
                            </label>

                            <label class="label">
                                <span class="legend">Palavras-Chave:</span>
                                <textarea name="keywords" cols="30" rows="4">{{ old('keywords') ?? $setting->keywords }}</textarea>
                            </label>


                            <div class="label_g2">

                                <label class="label">
                                    <span class="legend">Logotipo</span>
                                    <input type="file" name="logo">
                                </label>

                                <div class="dash_content_app_box">
                                    <section class="app_users_home">

                                        <article class="user radius">
                                            <div class="cover"
                                                 style="background-size: cover; background-image: url({{ $setting->url_logo }});"></div>
                                        </article>

                                    </section>
                                </div>

                            </div>


                            <div class="label_g2">

                                <label class="label">
                                    <span class="legend">Favico</span>
                                    <input type="file" name="favico">
                                </label>

                                <div class="dash_content_app_box">
                                    <section class="app_users_home">

                                        <article class="user radius">
                                            <div class="cover"
                                                 style="background-size: cover; background-image: url({{ $setting->url_favico }});"></div>
                                        </article>

                                    </section>
                                </div>

                            </div>


                            {{-- Endereço --}}
                            <div class="app_collapse_header collapse">
                                <h3>Endereço</h3>
                            </div>


                            <div class="label_g2">
                                <label class="label">
                                    <span class="legend">CEP:</span>
                                    <input type="tel" name="zipcode" class="mask-zipcode zip_code_search"
                                           placeholder="Digite o CEP"
                                           value="{{ old('zipcode') ?? $setting->zipcode }}"/>
                                </label>
                                <label class="label">
                                    <span class="legend">Endereço:</span>
                                    <input type="text" name="street" class="street"
                                           placeholder="Endereço Completo"
                                           value="{{ old('street') ?? $setting->street }}"/>
                                </label>
                                <label class="label" style="margin-left:20px">
                                    <span class="legend">Número:</span>
                                    <input type="text" name="number" placeholder="Número do Endereço"
                                           value="{{ old('number') ?? $setting->number }}"/>
                                </label>
                            </div>

                            <div class="label_g4">
                                <label class="label">
                                    <span class="legend">Complemento:</span>
                                    <input type="text" name="complement" placeholder="Completo (Opcional)"
                                           value="{{ old('complement') ?? $setting->complement  }}"/>
                                </label>
                                <label class="label">
                                    <span class="legend">Bairro:</span>
                                    <input type="text" name="neighborhood" class="neighborhood"
                                           placeholder="Bairro"
                                           value="{{ old('neighborhood') ?? $setting->neighborhood  }}"/>
                                </label>
                                <label class="label">
                                    <span class="legend">Estado:</span>
                                    <input type="text" name="state" class="state" placeholder="Estado"
                                           value="{{ old('state') ?? $setting->state }}"/>
                                </label>
                                <label class="label">
                                    <span class="legend">Cidade:</span>
                                    <input type="text" name="city" class="city" placeholder="Cidade"
                                           value="{{ old('city') ?? $setting->city }}"/>
                                </label>
                            </div>


                            {{-- Dados de Contato --}}
                            <div class="app_collapse_header collapse">
                                <h3>Dados de Contato</h3>
                            </div>

                            <div class="label_g4">
                                <label class="label">
                                    <span class="legend">Telefone:</span>
                                    <input type="tel" name="telephone" class="mask-phone"
                                           placeholder="Número do Telefonce com DDD"
                                           value="{{ old('telephone') ?? $setting->telephone }}"/>
                                </label>

                                <label class="label">
                                    <span class="legend">Celular:</span>
                                    <input type="tel" name="cell" class="mask-cell"
                                           placeholder="Número do Telefonce com DDD"
                                           value="{{ old('cell') ?? $setting->cell }}"/>
                                </label>


                                <label class="label">
                                    <span class="legend">*E-mail:</span>
                                    <input type="email" name="email" placeholder="Melhor e-mail"
                                           value="{{ old('email') ?? $setting->email }}"/>
                                </label>

                                <label class="label">
                                    <span class="legend">*Site:</span>
                                    <input type="string" name="site" placeholder="Site"
                                           value="{{ old('site') ?? $setting->site }}"/>
                                </label>

                            </div>




                            {{-- Redes Sociais  --}}
                            <div class="app_collapse_header collapse">
                                <h3>Redes Socials</h3>
                            </div>

                            <div class="label_g4">


                            <label class="label">
                                <span class="legend">Facebook:</span>
                                <input type="text" name="facebook" placeholder="Endereço do Facebook"
                                       value="{{ old('facebook') ?? $setting->facebook }}"/>
                            </label>

                            <label class="label">
                                <span class="legend">*Instagram:</span>
                                <input type="text" name="instagram" placeholder="Endereço do Instagram"
                                       value="{{ old('instagram') ?? $setting->instagram }}"/>
                            </label>

                            <label class="label">
                                <span class="legend">Youtube:</span>
                                <input type="text" name="youtube" placeholder="Endereço do Youtube"
                                       value="{{ old('youtube') ?? $setting->youtube}}"/>
                            </label>

                            <label class="label">
                                <span class="legend">Twitter:</span>
                                <input type="text" name="twitter" placeholder="Endereço do Twitter"
                                       value="{{ old('twitter') ?? $setting->twitter }}"/>
                            </label>

                            </div>


                            <label class="label">
                                <span class="legend">Link do EAD:</span>
                                <input type="text" name="ead" placeholder="Endereço do EAD"
                                       value="{{ old('ead') ?? $setting->ead }}"/>
                            </label>

                            <label class="label">
                                <span class="legend">Link do Plataforma Aluno:</span>
                                <input type="text" name="student_platform" placeholder="Endereço do EAD"
                                       value="{{ old('student_platform') ?? $setting->student_platform }}"/>
                            </label>


                            <div class="label_g2">

                                <label class="label">
                                    <span class="legend">Logotipo do Painel de Controle</span>
                                    <input type="file" name="logoadmin">
                                </label>

                                <div class="dash_content_app_box">
                                    <section class="app_users_home">

                                        <article class="user radius">
                                            <div class="cover"
                                                 style="background-size: cover; background-image: url({{ $setting->url_logoadmin }});"></div>
                                        </article>

                                    </section>
                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="text-right mt-2">
                        <button class="btn btn-large btn-green icon-check-square-o" type="submit">Salvar Alterações
                        </button>
                    </div>
                </form>


            </div>
        </div>
    </section>

@endsection