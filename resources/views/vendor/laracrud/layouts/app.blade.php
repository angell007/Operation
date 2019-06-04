<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:regular,bold">
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/fa.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/laracrud.css') }}">
    <title>@yield('title') | {{ config('app.name') }}</title>

</head>
<body class="bg-light h-100">
    @yield('parent-content')

    <script src="{{ asset('/js/jquery.min.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/js/datatables.min.js') }}"></script>
    <script src="{{ asset('/js/laracrud.js') }}"></script>
    @stack('scripts')

        <script type="application/javascript">
            function cambio() {
                var id = document.getElementById("proveedor_id").value;
                var txt = document.getElementById("lblpro");
                const xhr = new XMLHttpRequest();
                xhr.open('GET', ' {{route ('nit')}}/' + id, true);
                xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        respuesta = JSON.parse(xhr.responseText);
                        txt.style.display = 'block';
                        txt.innerHTML = " Nit del proveedor : " + respuesta.response[0].nit;
                    }

                }
                xhr.send()
            }

            function calcular(){
                var csi = document.getElementById("costo_sin_iva").value;
                var iva = document.getElementById("iva").value;
                var cantidad = document.getElementById("cantidad");
                var aux =(((parseInt(csi) * parseInt(iva)) / 100))+ parseInt(csi);
                document.getElementById("costo_con_iva").value = aux;
            }

            function costoParte(){
                document.getElementById("costo_base").value = '' ;
                var ref = parseInt(document.getElementById("ref").text);
                document.getElementById("costo_base").value = ref ;

            }

        </script>
</body>
</html>
