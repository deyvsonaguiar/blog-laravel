@extends('layouts.backend.app')

@section('title', 'Posts')

@push('css')

    <!-- JQuery DataTable Css -->
    <link href="{{ asset('assets\backend\plugins\jquery-datatable\skin\bootstrap\css\dataTables.bootstrap.css') }}" rel="stylesheet">

@endpush

@section('content')
<div class="container">
    <div class="container-fluid">
        <div class="block-header">
            <a href="{{ route('admin.posts.create') }}" class="btn btn-primary waves-effect">
            <i class="material-icons">add</i>
            <span>Nova Postagem</span></a>
        </div>

        <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                POSTAGENS
                                <span class="badge bg-blue">{{ $posts->count() }}</span>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Título</th>
                                            <th>Autor</th>
                                            <th><i class="material-icons">visibility</i></th>
                                            <th>Aprovação</th>
                                            <th>Status</th>
                                            <th>Criado em</th>
                                            <th>Atualizado em</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Título</th>
                                            <th>Autor</th>
                                            <th><i class="material-icons">visibility</i></th>
                                            <th>Aprovação</th>
                                            <th>Status</th>
                                            <th>Criado em</th>
                                            <th>Atualizado em</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                            @foreach ($posts as $post )
                                            <tr>
                                                <td>{{ $post->id }}</td>
                                                <td>{{ str_limit($post->title, '100') }}</td>
                                                <td>{{ $post->user->name }}</td>
                                                <td>{{ $post->view_count }}</td>
                                                <td>
                                                    @if($post->is_approved == true)
                                                        <span class="badge bg-blue">Aprovado</span>
                                                    @else
                                                        <span class="badge bg-pink">Pendente</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($post->status == true)
                                                        <span class="badge bg-blue">Publicado</span>
                                                    @else
                                                        <span class="badge bg-pink">Pendente</span>
                                                    @endif
                                                </td>
                                                <td>{{ $post->created_at }}</td>
                                                <td>{{ $post->updated_at }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('admin.posts.edit', $post->id) }}"
                                                    class="btn btn-info waves-effect">
                                                    <i class="material-icons">edit</i>
                                                    </a>

                                                    <button class="btn btn-danger waves-effect" type="button" onclick="deletePost({{ $post->id }})">
                                                    <i class="material-icons">delete</i>
                                                </button>
                                                <form id="delete-form-{{ $post->id }}" action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                                </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </div>
</div>
@endsection

@push('js')

    <!-- Jquery DataTable Plugin Js -->
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/pages/tables/jquery-datatable.js') }}"></script>
    <script src="{{ asset('assets/backend/js/sweetalert2.js') }}"></script>

    <script type="text/javascript">
       function deletePost(id) {

            const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false,
            })

            swalWithBootstrapButtons.fire({
            title: 'Você tem certeza?',
            text: "Esta ação não poderá ser revertida!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sim, excluir!',
            cancelButtonText: 'Não, cancelar!',
            reverseButtons: true
            }).then((result) => {
            if (result.value) {
                event.preventDefault();
                document.getElementById('delete-form-'+id).submit();
            } else if (
            // Read more about handling dismissals
            result.dismiss === Swal.DismissReason.cancel
            ) {
            swalWithBootstrapButtons.fire(
            'Cancelado',
            'Seu dado ainda está salvo',
            'erro'
            )
            }
            })

       }
    </script>

@endpush
