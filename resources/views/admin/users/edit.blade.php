@extends('admin.master.master')

@section('content')


    <section class="dash_content_app">

        <header class="dash_content_app_header">

            <h2 class="icon-user">Editar Usuário</h2>
            <div class="dash_content_app_header_actions">
                <nav class="dash_content_app_breadcrumb">
                    <ul>
                        <li><a href="{{ route('admin.home') }}">Painel de Controle</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="{{ route('admin.users.index') }}">Usuários</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="{{ route('admin.users.create') }}" class="text-orange">Criar Novo Usuário</a></li>
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
                        <a href="#data" class="nav_tabs_item_link active">Dados Cadastrais</a>
                    </li>
                </ul>

                <form class="app_form" action="{{ route('admin.users.update', ['user' => $user->id]) }}"
                      method="post" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $user->id }}">


                    {{-- ### Dados Cadastrais ### --}}
                    <div class="nav_tabs_content">
                        <div id="data">


                            <div class="label_g4">

                                <label class="label">
                                    <span class="legend">*Nome:</span>
                                    <input type="text" name="name" placeholder="Nome Completo"
                                           value="{{ old('name') ?? $user->name }}" required/>
                                </label>

                                <label class="label">
                                    <span class="legend">*E-mail:</span>
                                    <input type="email" name="email" placeholder="Melhor e-mail"
                                           value="{{ old('email') ?? $user->email }}" required/>
                                </label>

                                <label class="label" style="margin-left: 20px;">
                                    <span class="legend">Senha:</span>
                                    <input type="password" name="password" placeholder="Senha de acesso"
                                           value=""/>
                                </label>

                                <label class="label">
                                    <span class="legend">Foto</span>
                                    <input type="file" name="cover">
                                </label>


                            </div>


                            <div class="dash_content_app_box">
                                <section class="app_users_home">

                                    <article class="user radius">
                                        <div class="cover"
                                             style="background-size: cover; background-image: url({{ $user->url_cover }});"></div>
                                    </article>

                                </section>
                            </div>


                        </div>
                    </div>

                    <div class="text-right mt-2">
                        <button class="btn btn-large btn-green icon-check-square-o" type="submit">Salvar Alterações
                        </button>
                    </div>
                </form>



                <form action="{{ route('admin.users.destroy', ['id' => $user->id]) }}" method="post" class="app_form">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-large btn-red icon-trash">Excluir Usuário</button>
                </form>


            </div>
        </div>
    </section>

@endsection