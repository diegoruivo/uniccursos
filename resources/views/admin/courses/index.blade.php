@extends('admin.master.master')

@section('content')

    <section class="dash_content_app">

    <header class="dash_content_app_header">
        <h2 class="icon-tags">Cursos</h2>

        <div class="dash_content_app_header_actions">
            <nav class="dash_content_app_breadcrumb">
                <ul>
                    <li><a href="{{ route('admin.home') }}">Painel de Controle</a></li>
                    <li class="separator icon-angle-right icon-notext"></li>
                    <li><a href="{{ route('admin.courses.index') }}" class="text-orange">Cursos</a></li>
                </ul>
            </nav>

            <a href="{{ route('admin.courses.create') }}" class="btn btn-orange icon-tags ml-1">Criar Curso</a>
        </div>
    </header>


        <div class="dash_content_app_box">
            <div class="dash_content_app_box_stage">
                <table id="dataTable" class="nowrap hover stripe" width="100" style="width: 100% !important;">
                    <thead>
                    <tr>
                        <th>Curso</th>
                        <th width="80">Ação</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($courses as $course)

                        <tr>
                            <td>{{ $course->title }}</td>
                            <td>
                                <a href="{{ route('admin.courses.edit', ['course' => $course->id]) }}" class="btn btn-large btn-blue icon-check">
                                    Editar</a>
                            </td>
                        </tr>

                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </section>

@endsection