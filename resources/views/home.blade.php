@extends('layouts.authBase')

@section('content')

    <main class="home-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="jumbotron">
                        <div class="row">
                            <h1 class="display-4 ml-3">Hello, {{ $user->name }}!</h1>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 mt-4" style="margin-left: auto;">
                                <a class="btn btn-danger btn-sm btn-block" href="{{ route('logout') }}" role="button">
                                    Sair <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                        <p class="lead">Acessos:</p>
                        <hr class="my-4">
                        {{-- <p>It uses utility classes for typography and spacing to space content out within the larger container.</p> --}}
                        <p class="lead">
                            <div class="row">
                                <!-- <div class="access" style="margin-left: 30px;">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <a class="btn btn-success btn-sm btn-block"  href="{{ route('user.index') }}" role="button">
                                            Usuário
                                        </a>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <a class="btn btn-primary btn-sm btn-block"  href="{{ route('menu.index') }}" role="button">
                                            Menu
                                        </a>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <a class="btn btn-info btn-sm btn-block"  href="{{ route('permission.index') }}" role="button">
                                            Permissão
                                        </a>
                                    </div>
                                </div> -->
                                <!-- <div class="access_user" style="margin-right: 50px;">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <a class="btn btn-danger btn-sm btn-block"  href="{{ route('course.index') }}" role="button">
                                                Curso
                                            </a>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <a class="btn btn-warning btn-sm btn-block"  href="{{ route('category.index') }}" role="button">
                                                Categoria
                                            </a>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <a class="btn btn-secondary btn-sm btn-block"  href="{{ route('file.index') }}" role="button">
                                                Arquivo
                                            </a>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="access" style="margin-left: 30px;">
                                    @foreach ($menu as $value)
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-3">
                                            <a class="btn btn-success btn-sm btn-block"  href="{{ route($value->link) }}" role="button">
                                                {{ $value->name }}
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        </div>

    </main>

@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>

<script type="text/javascript">

    $(document).ready(function() {
        $('#formLogin').submit(function(e){
            e.preventDefault();
            // var dados = new FormData(this);
            var formdata = new FormData($("form[id='formLogin']")[0]);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{route("login-autentication")}}',
                type: "POST",
                data: formdata,
                processData: false,
                cache: false,
                contentType: false,
                success: function( data ) {
                    console.log(data);
                },
                error: function (request, status, error) {
                    alert(request.responseText);
                }
            });
            return false;
        });
    });

</script>
