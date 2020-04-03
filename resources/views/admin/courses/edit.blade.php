@extends('admin.master.master')

@section('content')


    <section class="dash_content_app">

        <header class="dash_content_app_header">
            <h2 class="icon-tags">Curso</h2>

            <div class="dash_content_app_header_actions">
                <nav class="dash_content_app_breadcrumb">
                    <ul>
                        <li><a href="{{ route('admin.home') }}">Painel de Controle</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="{{ route('admin.courses.index') }}">Cursos</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="{{ route('admin.courses.create') }}" class="text-orange">Criar Novo Curso</a>
                        </li>
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

                <ul class="nav_tabs">
                    <li class="nav_tabs_item">
                        <a href="#data" class="nav_tabs_item_link active">Dados do Curso</a>
                    </li>
                </ul>

                <form action="{{ route('admin.courses.update', ['course' => $course->id]) }}" method="post"
                      class="app_form"
                      enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <div class="nav_tabs_content">
                        <div id="data">


                            <div class="label_g2">

                                <label class="label">
                                    <span class="legend">*Nome do Curso:</span>
                                    <input type="text" name="title" placeholder="Nome do Curso"
                                           value="{{ old('title') ?? $course->title }}" required/>
                                </label>


                                <label class="label">
                                    <span class="legend">Subtítulo:</span>
                                    <input type="text" name="subtitle" placeholder="Subtítulo"
                                           value="{{ old('subtitle') ?? $course->subtitle }}"/>
                                </label>


                                <label class="label" style="margin-left: 20px;">
                                    <span class="legend">Posição na Lista de Cursos:</span>
                                    <input type="number" name="position" placeholder="Posição"
                                           value="{{ old('position') ?? $course->position }}"/>
                                </label>

                            </div>


                            <label class="label">
                                <span class="legend">Descrição do Curso:</span>
                                <textarea name="description" cols="30" rows="10"
                                          class="mce">{{ old('description') ?? $course->description }}</textarea>
                            </label>

                            <div class="label_g2">

                                <label class="label" style="margin-left: 20px;">
                                    <span class="legend">Imagem</span>
                                    <input type="file" name="cover">
                                </label>

                                <div class="dash_content_app_box">
                                    <section class="app_users_home">

                                        <article class="user radius">
                                            <div class="cover"
                                                 style="background-size: cover; background-image: url({{ $course->url_cover }});"></div>
                                        </article>

                                    </section>
                                </div>
                            </div>

                        </div>
                    </div>


                    <div class="text-right mt-2">
                        <button class="btn btn-large btn-green icon-check-square-o">Atualizar Curso</button>
                    </div>
                </form>


                <form action="{{ route('admin.courses.destroy', ['id' => $course->id]) }}" method="post"
                      class="app_form">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-large btn-red icon-trash">Excluir Curso</button>
                </form>


            </div>
        </div>
    </section>

@endsection