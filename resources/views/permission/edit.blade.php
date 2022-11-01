@extends('layouts.authBase')

@section('content')

<style>
    .bold
    {
        font-weight: bold;
    }
</style>

<main class="permission-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="container-fluid">
                <!-- INCIO CARD ATUALIZAR PERMISSION -->
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row ml-1">
                                    <h2 class="bold">
                                        Atualizar Permissão - ID: {{ $permission->id }}
                                    </h2>
                                </div>
                                <x-erro :message="$errors->all()"/>
                                <x-sucesso message="{{ session('success') }}" />
                                <form action="{{ route('permission.update',['id' => $permission->id]) }}" method="post">
                                    @csrf
                                    @method('PUT')

                                    <div class="permission">
                                        <div class="row ml-1">
                                            <h4 class="bold">
                                                Dados
                                            </h4>
                                        </div>
                                        <hr style="margin-top: -5px;">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                                                <div class="form-permission">
                                                    <b>Nome:</b>
                                                    <input type="text" class="form-control" name="name" maxlength="255" required value="{{ $permission->name }}" >
                                                    <span class="error-validate"><p id="validate-name"></p></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row ml-1">
                                        <div class="form-group">
                                            <div class="btn-group" role="group">
                                                <a class="btn btn-primary btn-sm" href="{{ route('permission.index') }}" role="button">
                                                    <i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i> Voltar
                                                </a>
                                            </div>
                                            <div class="btn-group" role="group">
                                                <button class="btn btn-success btn-sm" type="submit">
                                                    <i class="fa fa-check-circle-o" aria-hidden="true"></i> Atualizar
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- FIM CARD ATUALIZAR PERMISSION -->
            </div>
        </div>
    </div>
</main>

@endsection
