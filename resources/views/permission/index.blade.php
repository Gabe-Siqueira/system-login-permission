@extends('layouts.authBase')

@section('content')

<style>
    body{
        margin: 0;
        font-size: .9rem;
        font-weight: 400;
        line-height: 1.6;
        color: #212529;
        text-align: left;
        background-color: #f5f8fa;
    }
    .navbar-laravel
    {
        box-shadow: 0 2px 4px rgba(0,0,0,.04);
    }
    .navbar-brand , .nav-link, .my-form, .login-form
    {
        font-family: Raleway, sans-serif;
    }
    .my-form
    {
        padding-top: 1.5rem;
        padding-bottom: 1.5rem;
    }
    .my-form .row
    {
        margin-left: 0;
        margin-right: 0;
    }
    .permission-form
    {
        padding-top: 1.5rem;
        padding-bottom: 1.5rem;
    }
    .permission-form .row
    {
        margin-left: 0;
        margin-right: 0;
    }
</style>

<main class="permission-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <x-erro :message="$errors->all()"/>
                        <x-sucesso message="{{ session('success') }}" />
                    </div>
                </div>
                <!-- INCIO CARD LISTA PERMISSION -->
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <a class="btn btn-info btn-sm mb-3" href="{{ route('home') }}">Voltar</a>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <h2 style="margin-left: 30px;">
                                        Permissão
                                    </h2>
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12" style="margin-left: auto; margin-right: 15px;">
                                        <a class="btn btn-success btn-sm btn-block" href="{{ route('permission.create') }}" role="button">
                                            Cadastrar <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="table-responsive-sm  table-responsive-md mt-3">
                                    <table id="permissionDataTable" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nome</th>
                                                <th>Data Criação</th>
                                                <th>Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($permission as $value)
                                                <tr class="table-active" id="{{ $value->id }}">
                                                    <th>{{$value->id}}</th>
                                                    <td>{{$value->name}}</td>
                                                    <td>{{\Carbon\Carbon::parse($value->created_at)->tz('America/Sao_Paulo')->format('d/m/Y H:i:s')}}</td>
                                                    <td class="text-center">
                                                        <div class="row" style="display: inline-flex;">
                                                            <a class="btn btn-primary btn-sm" href="{{ route('permission.edit',['id' => $value->id_menu]) }}" role="button">
                                                                Editar <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                            </a>
                                                            <form method="post" class="delete_form" action="{{ route('permission.destroy',['id' => $value->id_menu]) }}">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button type="submit" class="btn btn-sm btn-danger">
                                                                    Excluir <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                                </button>
                                                            </form>
                                                        </div>
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
                <!-- FIM CARD LISTA PERMISSION -->
            </div>
        </div>
    </div>
</main>

{{-- INICIO MODAL DELETE --}}
<div id="modal" class="modal fade" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Deseja realmente excluir este registro?</h5>
            </div>
            <div class="modal-footer">
                <form name="delete-form" action="" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Sim</button>
                </form>
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
{{-- FIM MODAL DELETE --}}

@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $('#permissionDataTable').DataTable({
                "language" : {
                        "decimal": ",",
                        "thousands": ",",
                        "sEmptyTable": "Nenhum registro encontrado",
                        "sInfo": "Mostrando  _START_ até _END_ de _TOTAL_ Resultados",
                        "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                        "sInfoFiltered": "(Filtrados de MAX registros)",
                        "sInfoPostFix": "",
                        "sInfoThousands": ".",
                        "sLengthMenu": "_MENU_ resultados por página",
                        "sLoadingRecords": "Carregando...",
                        "sProcessing": "Processando...",
                        "sZeroRecords": "Nenhum registro encontrado",
                        "sSearch": "Pesquisar",
                        "oPaginate": {
                            "sNext": "Próximo",
                            "sPrevious": "Anterior",
                            "sFirst": "Primeiro",
                            "sLast": "Último"
                        },
                        "oAria": {
                            "sSortAscending": ": Ordenar colunas de forma ascendente",
                            "sSortDescending": ": Ordenar colunas de forma descendente"
                        }
                    }
            });
            $('.dataTables_length').addClass('bs-select');
        });
        $("[name='excluir'").click(function(){
            var action = $("[name='delete-form']").attr('action',"permission/"+$(this).val());
        })
    </script>
@endsection

