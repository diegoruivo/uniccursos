@extends('admin.master.master')

@section('content')


    <section class="dash_content_app">

        <header class="dash_content_app_header">
            <h2 class="icon-tags">Página</h2>

            <div class="dash_content_app_header_actions">
                <nav class="dash_content_app_breadcrumb">
                    <ul>
                        <li><a href="{{ route('admin.home') }}">Painel de Controle</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="{{ route('admin.pages.index') }}">Páginas</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="{{ route('admin.pages.create') }}" class="text-orange">Criar Nova Página</a>
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

                @if(session()->exists('message'))

                    @message(['color' => session()->get('color')])
                    <p class="icon-asterisk">{{ session()->get('message') }}</p>
                    @endmessage

                @endif

                <ul class="nav_tabs">
                    <li class="nav_tabs_item">
                        <a href="#data" class="nav_tabs_item_link active">Dados da Página</a>
                    </li>

                    <li class="nav_tabs_item">
                        <a href="#images" class="nav_tabs_item_link">Imagens</a>
                    </li>
                </ul>

                <form action="{{ route('admin.pages.update', ['page' => $page->id]) }}" method="post" class="app_form"
                      enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <div class="nav_tabs_content">
                        <div id="data">



                            <div class="label_g2">

                                <label class="label">
                                    <span class="legend">*Título:</span>
                                    <input type="text" name="title" placeholder="Título da Página" value="{{ old('title') ?? $page->title }}" required />
                                </label>


                                <label class="label">
                                    <span class="legend">Subtítulo:</span>
                                    <input type="text" name="subtitle" placeholder="Subtítulo" value="{{ old('subtitle') ?? $page->subtitle }}"/>
                                </label>

                            </div>


                            <label class="label">
                                <span class="legend">Texto:</span>
                                <textarea name="description" cols="30" rows="10"
                                          class="mce">{{ old('description') ?? $page->description }}</textarea>
                            </label>




                            <div class="label_g2">

                                <label class="label">
                                    <span class="legend">*Posição no Menu:</span>
                                    <input type="number" name="position" placeholder="Posição no Menu" value="{{ old('position') ?? $page->position }}" required />
                                </label>

                            </div>



                        </div>



                    <div id="images" class="d-none">
                        <label class="label">
                            <span class="legend">Imagens</span>
                            <input type="file" name="files[]" multiple>
                        </label>

                        <div class="content_image"></div>


                        <div class="property_image">
                            @foreach($page->images()->get() as $image)
                                <div class="property_image_item">
                                    <img src="{{ $image->url_cropped}}" alt="">
                                    <div class="property_image_actions">
                                        <a href="javascript:void(0)" class="btn btn-small {{ ($image->cover == true ? 'btn-green' : '') }} icon-check icon-notext image-set-cover" data-action="{{ route('admin.pages.imageSetCover', ['image' => $image->id]) }}"></a>
                                        <a href="javascript:void(0)" class="btn btn-red btn-small icon-times icon-notext image-remove" data-action="{{ route('admin.pages.imageRemove', ['image' => $image->id])  }}"></a>
                                    </div>
                                </div>
                            @endforeach
                        </div>


                    </div>
            </div>

                    <div class="text-right mt-2">
                        <button class="btn btn-large btn-green icon-check-square-o">Atualizar Página</button>
                    </div>
                </form>


                    <form action="{{ route('admin.pages.destroy', ['id' => $page->id]) }}" method="post" class="app_form">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-large btn-red icon-trash">Excluir Página</button>
                    </form>


            </div>
        </div>
    </section>

@endsection



@section('js')
    <script>
        $(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('input[name="files[]"]').change(function (files) {

                $('.content_image').text('');

                $.each(files.target.files, function (key, value) {
                    var reader = new FileReader();
                    reader.onload = function (value) {
                        $('.content_image').append(
                            '<div class="property_image_item">' +
                            '<div class="embed radius" ' +
                            'style="background-image: url(' + value.target.result + '); background-size: cover; background-position: center center;">' +
                            '</div>' +
                            '</div>');
                    };
                    reader.readAsDataURL(value);
                });
            });

            $('.image-set-cover').click(function (event) {
                event.preventDefault();

                var button = $(this);

                $.post(button.data('action'), {}, function (response) {
                    if(response.success === true) {
                        $('.property_image').find('a.btn-green').removeClass('btn-green');
                        button.addClass('btn-green');
                    }
                }, 'json');
            });

            $('.image-remove').click(function (event) {
                event.preventDefault();

                var button = $(this);

                $.ajax({
                    url: button.data('action'),
                    type: 'DELETE',
                    dataType: 'json',
                    success: function(response) {
                        if(response.success === true) {
                            button.closest('.property_image_item').fadeOut(function () {
                                $(this).remove();
                            })
                        }
                    }
                })
            });

        });
    </script>
@endsection