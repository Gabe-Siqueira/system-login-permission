@extends('layouts.authBase')

@if ($errors)
    @foreach ($errors as $errors)
        dd($errors);
    @endforeach

@endif

@section('content')

<style>
    .bold
    {
        font-weight: bold;
    }
</style>

<main class="user-form">
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="container-fluid">
                <!-- INCIO CARD CRIAR USER -->
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row ml-1">
                                    <h2 class="bold">
                                        Cadastrar Usuário
                                    </h2>
                                </div>
                                <x-erro :message="$errors->all()"/>
                                <x-sucesso message="{{ session('success') }}" />
                                <form action="{{route('user.store')}}" method="post">
                                    @csrf
                                    <div class="user">
                                        <div class="row ml-1">
                                            <h4 class="bold">
                                                Dados
                                            </h4>
                                        </div>
                                        <hr style="margin-top: -5px;">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                                                <div class="form-user">
                                                    <b>Usuário:</b>
                                                    <input type="text" class="form-control" name="name" maxlength="255" required >
                                                    <span class="error-validate"><p id="validate-name"></p></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                                                <div class="form-user">
                                                    <b>Email:</b>
                                                    <input type="text" class="form-control" name="email" maxlength="255" required >
                                                    <span class="error-validate"><p id="validate-email"></p></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                                                <div class="form-user">
                                                    <b>Senha:</b>
                                                    <input type="password" class="form-control" name="password" maxlength="255" required >
                                                    <span class="error-validate"><p id="validate-password"></p></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="perfil">
                                        <div class="row ml-1">
                                            <h4 class="bold">
                                                Perfil
                                            </h4>
                                        </div>
                                        <hr style="margin-top: -5px;">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                                                <div class="form-group">
                                                    <select class="form-control" name="id_profile" required >
                                                        @foreach ($profile as $value)
                                                            @if ($userAuth->id_profile == 1)
                                                                <option value="{{ $value->id }}">
                                                                    {{ $value->name }}
                                                                </option>
                                                            @else
                                                                @if ($value->id != 1)
                                                                    <option value="{{ $value->id }}">
                                                                        {{ $value->name }}
                                                                    </option>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row ml-1">
                                        <div class="form-group">
                                            <div class="btn-group" role="group">
                                                <a class="btn btn-primary btn-sm" href="{{ route('user.index') }}" role="button">
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
                <!-- FIM CARD CRIAR USER -->
            </div>
        </div>
    </div>
</main>

@endsection
