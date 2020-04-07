@extends('admin.master.master')

@section('content')


    <section class="dash_content_app">

        <header class="dash_content_app_header">
            <h2 class="icon-tags">Editar Categoria de Cursos</h2>

            <div class="dash_content_app_header_actions">
                <nav class="dash_content_app_breadcrumb">
                    <ul>
                        <li><a href="{{ route('admin.home') }}">Painel de Controle</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="{{ route('admin.courses.index') }}">Cursos</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="{{ route('admin.course_category.index') }}">Categorias de Cursos</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="{{ route('admin.course_category.create') }}" class="text-orange">Cadastrar Nova Categoria de Cursos</a>
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
                        <a href="#data" class="nav_tabs_item_link active">Dados do Categoria de Cursos</a>
                    </li>
                </ul>

                <form action="{{ route('admin.course_category.update', ['course_category' => $category->id]) }}" method="post" class="app_form"
                      enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <div class="nav_tabs_content">
                        <div id="data">

                            <div class="label_g2">
                                <label class="label">
                                    <span class="legend">*Nome da Categoria de Curso:</span>
                                    <input type="text" name="title" placeholder="Nome da Categoria de Curso" value="{{ old('title') ?? $category->title }}" required />
                                </label>

                                <label class="label" style="margin-left: 20px;">
                                    <span class="legend">Posição na Lista de Cursos:</span>
                                    <input type="number" name="position" placeholder="Posição" value="{{ old('position')  ?? $category->position }}" />
                                </label>
                            </div>


                            <label class="label">
                                <span class="legend">Imagem</span>
                                <input type="file" name="cover">
                            </label>

                            <label class="label">
                                <img src="
                               @if($category->cover)
                                {{ url('storage/' . $category->cover)  }}
                                @endif
                                        " alt="">
                            </label>


                        </div>
                    </div>




                    <div class="text-right mt-2">
                        <button class="btn btn-large btn-green icon-check-square-o">Atualizar Categoria de Cursos</button>
                    </div>
                </form>


                    <form action="{{ route('admin.course_category.destroy', ['id' => $category->id]) }}" method="post" class="app_form">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-large btn-red icon-trash">Excluir Categoria de Cursos</button>
                    </form>


            </div>
        </div>
    </section>

@endsection