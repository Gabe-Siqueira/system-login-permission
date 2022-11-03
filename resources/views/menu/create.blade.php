@extends('layouts.authBase')

@section('content')

<style>
    .bold
    {
        font-weight: bold;
    }
</style>

<main class="menu-form">
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="container-fluid">
                <!-- INCIO CARD CRIAR MENU -->
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row ml-1">
                                    <h2 class="bold">
                                        Cadastrar Menu
                                    </h2>
                                </div>
                                <x-erro :message="$errors->all()"/>
                                <x-sucesso message="{{ session('success') }}" />
                                <form action="{{route('menu.store')}}" method="post">
                                    @csrf
                                    <div class="menu">
                                        <div class="row ml-1">
                                            <h4 class="bold">
                                                Dados
                                            </h4>
                                        </div>
                                        <hr style="margin-top: -5px;">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                                                <div class="form-menu">
                                                    <b>Nome:</b>
                                                    <input type="text" class="form-control" name="name" maxlength="255" required >
                                                    <span class="error-validate"><p id="validate-name"></p></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                                                <div class="form-menu">
                                                    <b>Tipo:</b>
                                                    <select class="form-control" name="id_menu_type" required >
                                                        @foreach ($menuType as $value)
                                                            @if ($value->name != "tela")
                                                                <option value="{{ $value->id }}" disabled>
                                                                    {{ $value->name }}
                                                                </option>
                                                            @else
                                                                <option value="{{ $value->id }}" >
                                                                    {{ $value->name }}
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                                                <div class="form-menu">
                                                    <b>Link:</b>
                                                    <input type="text" class="form-control" name="link" maxlength="255" >
                                                    <span class="error-validate"><p id="validate-link"></p></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                                                <div class="form-menu">
                                                    <b>Icone:</b>
                                                    <input type="text" class="form-control" name="icon" maxlength="255" >
                                                    <span class="error-validate"><p id="validate-icon"></p></span>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                                                <div class="form-menu">
                                                    <b>Ordem:</b>
                                                    <input type="number" class="form-control" name="order" maxlength="255" value="0" required >
                                                    <span class="error-validate"><p id="validate-order"></p></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row ml-1">
                                        <div class="form-group">
                                            <div class="btn-group" role="group">
                                                <a class="btn btn-primary btn-sm" href="{{ route('menu.index') }}" role="button">
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
                <!-- FIM CARD CRIAR MENU -->
            </div>
        </div>
    </div>
</main>

@endsection
