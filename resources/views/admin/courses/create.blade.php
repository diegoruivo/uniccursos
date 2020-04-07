@extends('admin.master.master')

@section('content')


    <section class="dash_content_app">

        <header class="dash_content_app_header">
            <h2 class="icon-tags">Cadastrar Curso</h2>

            <div class="dash_content_app_header_actions">
                <nav class="dash_content_app_breadcrumb">
                    <ul>
                        <li><a href="{{ route('admin.home') }}">Painel de Controle</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="{{ route('admin.courses.index') }}">Cursos</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="" class="text-orange">Cadastrar Curso</a>
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

                <form action="{{ route('admin.courses.store') }}" method="post" class="app_form"
                      enctype="multipart/form-data">

                    @csrf

                    <div class="nav_tabs_content">
                        <div id="data">

                            <div class="label_g2">
                                <label class="label">
                                    <span class="legend">*Categoria do Curso:</span>
                                    <select name="course" class="select2" required>
                                        <option value="">Selecione a Categoria do Curso</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->title}}
                                            </option>
                                        @endforeach
                                    </select>
                                    <p style="margin-top: 4px;">
                                        <a href="{{ route('admin.course_category.index') }}"
                                           class="text-orange icon-link" style="font-size: .8em;" target="_blank">Editar
                                            Categorias de Cursos</a> |
                                        <a href="{{ route('admin.course_category.create') }}"
                                           class="text-orange icon-link" style="font-size: .8em;" target="_blank">Cadastrar
                                            Nova Categoria de Cursos</a>
                                    </p>
                                </label>
                                <label class="label">
                                    <span class="legend">*Nome do Curso:</span>
                                    <input type="text" name="title" placeholder="Nome do Curso" value="{{ old('title') }}" required />
                                </label>
                            </div>

                            <div class="label_g2">



                                <label class="label">
                                    <span class="legend">Subtítulo:</span>
                                    <input type="text" name="subtitle" placeholder="Subtítulo" value="{{ old('subtitle') }}" />
                                </label>

                                <label class="label" style="margin-left: 20px;">
                                    <span class="legend">Posição na Lista de Cursos:</span>
                                    <input type="number" name="position" placeholder="Posição" value="{{ old('position') }}" />
                                </label>

                            </div>


                            <label class="label">
                                <span class="legend">Descrição do Curso:</span>
                                <textarea name="description" cols="30" rows="10"
                                          class="mce">{{ old('description') }}</textarea>
                            </label>



                        </div>
                    </div>


                    <div class="text-right mt-2">
                        <button class="btn btn-large btn-green icon-check-square-o">Criar Curso</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection