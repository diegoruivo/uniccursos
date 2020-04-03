@extends('admin.master.master')

@section('content')

<section class="dash_content_app">

    <header class="dash_content_app_header">
        <h2 class="icon-users">Configurações do Site</h2>

        <div class="dash_content_app_header_actions">
            <nav class="dash_content_app_breadcrumb">
                <ul>
                    <li><a href="{{ route('admin.home') }}">Painel de Controle</a></li>
                    <li class="separator icon-angle-right icon-notext"></li>
                    <li><a href="{{ route('admin.settings.index') }}" class="text-orange">Configurações do Site</a></li>
                </ul>
            </nav>
        </div>
    </header>


    <div class="dash_content_app_box">
        <div class="dash_content_app_box_stage">
            <table id="dataTable" class="nowrap stripe" width="100" style="width: 100% !important;">
                <thead>
                <tr>
                    <th>Título do Site</th>
                    <th width="80">Ação</th>
                </tr>
                </thead>
                <tbody>
                @foreach($settings as $setting)
                <tr>
                    <td>{{ $setting->id }}</td>
                    <td>
                        <a href="{{ route('admin.settings.edit', ['setting' => $setting->id]) }}" class="btn btn-large btn-blue icon-check">
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