@extends('layouts.backend.app')

@section('title', 'Post')

@push('css')

@endpush

@section('content')
<div class="container">
    <div class="container-fluid">
        <div class="block-header">

        </div>

        <!-- Vertical Layout -->
        <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                ADICIONAR NOVA POSTAGEM
                            </h2>
                        </div>
                        <div class="body">
                            <form action="{{ route('admin.posts.store') }}" method="POST"
                            enctype="multipart/form-data">
                                @csrf
                                <label>Título</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="title" name="title" class="form-control" placeholder="Digite um título...">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="file" id="image" name="image" class="form-control">
                                    </div>
                                </div>
                                <label>Texto</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="body" name="body" class="form-control">
                                    </div>
                                </div>
                                <br>
                                <a href="{{ route('admin.category.index')}}" class="btn btn-danger m-t-15 waves-effect">VOLTAR</a>
                                <button type="submit" class="btn btn-primary m-t-15 waves-effect">ENVIAR</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Vertical Layout -->

    </div>
</div>
@endsection

@push('js')

@endpush
