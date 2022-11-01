@extends('layouts.authBase')

@section('content')

<style>
    .bold
    {
        font-weight: bold;
    }
</style>

<main class="menu-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="container-fluid">
                <!-- INCIO CARD ATUALIZAR MENU -->
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row ml-1">
                                    <h2 class="bold">
                                        Atualizar Menu - ID: {{ $menu->id }}
                                    </h2>
                                </div>
                                <x-erro :message="$errors->all()"/>
                                <x-sucesso message="{{ session('success') }}" />
                                <form action="{{ route('menu.update',['id' => $menu->id]) }}" method="post">
                                    @csrf
                                    @method('PUT')

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
                                                    <input type="text" class="form-control" name="name" maxlength="255" required value="{{ $menu->name }}" >
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
                                                            <option value="{{ $value->id }}" {{ ($value->id == $menu->id_menu_type) ? "selected" : "" }} >
                                                                {{ $value->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                                                <div class="form-menu">
                                                    <b>Link:</b>
                                                    <input type="text" class="form-control" name="link" maxlength="255" value="{{ $menu->link }}" >
                                                    <span class="error-validate"><p id="validate-link"></p></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                                                <div class="form-menu">
                                                    <b>Icone:</b>
                                                    <input type="text" class="form-control" name="icon" maxlength="255" value="{{ $menu->icon }}" >
                                                    <span class="error-validate"><p id="validate-icon"></p></span>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                                                <div class="form-menu">
                                                    <b>Ordem:</b>
                                                    <input type="number" class="form-control" name="order" maxlength="255" required value="{{ $menu->order }}" >
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
                <!-- FIM CARD ATUALIZAR MENU -->
            </div>
        </div>
    </div>
</main>

@endsection
