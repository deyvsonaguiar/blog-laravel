@extends('layouts.backend.app')

@section('title', 'Tag')

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
                                EDITAR TAG
                            </h2>
                        </div>
                        <div class="body">
                            <form action="{{ route('admin.tag.update', $tag->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <label>Nome</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="name" name="name" value="{{ $tag->name }}"
                                        class="form-control">
                                    </div>
                                </div>
                                <br>
                                <a href="{{ route('admin.tag.index')}}" class="btn btn-danger m-t-15 waves-effect">VOLTAR</a>
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
