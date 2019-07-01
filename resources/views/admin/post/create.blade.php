@extends('layouts.backend.app')

@section('title', 'Post')

@push('css')

    <!-- Bootstrap Select Css -->
    <link href="{{ asset('assets/backend/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />

@endpush

@section('content')
<div class="container">
    <div class="container-fluid">
        <div class="block-header">

        </div>

        <!-- Vertical Layout -->
    <form action="{{ route('admin.posts.store') }}" method="POST"
          enctype="multipart/form-data">
        @csrf
        <div class="row clearfix">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                ADICIONAR NOVA POSTAGEM
                            </h2>
                        </div>
                        <div class="body">
                            <div class="form-group">
                                <label>Título:</label>
                                <input type="text" id="title" name="title" class="form-control" placeholder="Digite um título...">
                            </div>
                            <div class="form-group">
                                <label>Imagem:</label>
                                <input type="file" id="image" name="image" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="checkbox" id="publish" name="status" class="form-control" value="1">
                                <label for="publish">Publicar</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            CATEGORIAS E TAGS
                        </h2>
                    </div>
                    <div class="body">
                            <div class="form-group">
                                {{ $errors->has('categories') ? 'focused error' : '' }}
                                <label for="category">Categorias</label>
                                <select name="categories[]" id="category" class="form-control show-tick" data-live-search="true" multiple>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                {{ $errors->has('tags') ? 'focused error' : '' }}
                                <label for="tag">Tags</label>
                                <select name="tags[]" id="tag" class="form-control show-tick" data-live-search="true" multiple>
                                    @foreach($tags as $tag)
                                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <a href="{{ route('admin.posts.index')}}" class="btn btn-danger m-t-15 waves-effect">VOLTAR</a>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">ENVIAR</button>
                        </form>
                    </div>
                </div>
            </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            TEXTO
                        </h2>
                    </div>
                    <div class="body">
                        <textarea id="tinymce" name="body"></textarea>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </form>
            <!-- #END# Vertical Layout -->

    </div>
</div>
@endsection

@push('js')

    <!-- Select Plugin Js -->
    <script src="{{ asset('assets/backend/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
    <!-- TinyMCE -->
    <script src="{{ asset('assets/backend/plugins/tinymce/tinymce.js') }}"></script>

    <script>
        $(function () {
            //TinyMCE
            tinymce.init({
                selector: "textarea#tinymce",
                theme: "modern",
                height: 300,
                plugins: [
                    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                    'searchreplace wordcount visualblocks visualchars code fullscreen',
                    'insertdatetime media nonbreaking save table contextmenu directionality',
                    'emoticons template paste textcolor colorpicker textpattern imagetools'
                ],
                toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                toolbar2: 'print preview media | forecolor backcolor emoticons',
                image_advtab: true
            });
            tinymce.suffix = ".min";
            tinyMCE.baseURL = '{{ asset('assets/backend/plugins/tinymce') }}';
        });
    </script>

@endpush
