@extends('laracrud::layouts.auth')

@section('title', 'Home')
@section('child-content')
    {{-- <h2 class="mb-3">@yield('title')</h2> --}}
<div class="container" style="margin-top: 50px;">
    <div class="card">
        <div class="card-body">
            <div class="jumbotron">
                <h1 class="display-4 font-weight-bold" style="font-size: calc(1.5rem + 1vw);">Una nueva proyeccion en el mercado Barranqueño</h1>
                <p class="lead">
                        Nuestra empresa tiene sentido de pertenencia y compromiso con la economía de nuestra región, estamos impulsando la comercializacion tecnológica, el negocio actual y mas rentable a nivel mundial, inexistente en la ciudad, como mecanismo de negocio alterno a los hidrocarburos.
                        Ofrecemos al mercado Barranqueño una forma diferente de producir ingresos , es el momento de cambiar la percepción que tenemos, orientarnos a ser una ciudad nueva, una ciudad futuro.
                </p>
                <hr class="my-4">
                <p>.</p>
                <p class="lead">
                    <a class="btn btn-dark btn-lg" href="https://www.facebook.com/operacionsistemica/" role="button" target="_blank">Facebook</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
