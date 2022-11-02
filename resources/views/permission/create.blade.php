@extends('layouts.authBase')

@section('content')

<style>
    .bold
    {
        font-weight: bold;
    }
</style>

<main class="permission-form">
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="container-fluid">
                <!-- INCIO CARD CRIAR PERMISSION -->
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row ml-1">
                                    <h2 class="bold">
                                        Cadastrar Permissão
                                    </h2>
                                </div>
                                <x-erro :message="$errors->all()"/>
                                <x-sucesso message="{{ session('success') }}" />
                                <form action="{{route('permission.store')}}" method="post">
                                    @csrf
                                    <div class="menu">
                                        <div class="row ml-1">
                                            <h4 class="bold">
                                                Acesso
                                            </h4>
                                        </div>
                                        <hr style="margin-top: -5px;">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                                                <div class="form-group">
                                                    <b>Menu:</b>
                                                    <select class="form-control" name="menu" required >
                                                        <option value="">Selecione</option>
                                                        @foreach ($menu as $value)
                                                            <option value="{{ $value->id }}_{{ $value->name }}">
                                                                {{ $value->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="user">
                                        <div class="row ml-1">
                                            <h4 class="bold">
                                                Usuários
                                            </h4>
                                        </div>
                                        <hr style="margin-top: -5px;">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                                                <div class="form-group">
                                                    <select class="form-control selectpicker" name="user[]" multiple require >
                                                        @foreach ($user as $key => $value)
                                                            <optgroup label="{{ $key }}">
                                                                @foreach ($value as $id => $name)
                                                                    <option value="{{ $id }}">
                                                                        {{ $name }}
                                                                    </option>
                                                                @endforeach
                                                            </option>
                                                        @endforeach
                                                    </select>
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
                                                    <i class="fa fa-check-circle-o" aria-hidden="true"></i> Cadastrar
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- FIM CARD CRIAR PERMISSION -->
            </div>
        </div>
    </div>
</main>

@endsection

@section('js')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.6/js/bootstrap-select.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.6/css/bootstrap-select.min.css" rel="stylesheet" />

    <script>
        $(document).ready(function() {
            $('.selectpicker').selectpicker({
                noneSelectedText : 'Selecione',
            });
        });
    </script>

@endsection
