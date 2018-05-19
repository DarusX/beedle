<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/webby.css')}}">
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
    <style>
        .color{
            width: 50px !important;
            height: 50px !important;
        }
    </style>
    @yield('css')
</head>

<body>
    @include('layouts.navbar')
    <div class="container">
        <div class="row" id="main">
            @yield('content')
            
        </div>
        
    </div>
    @include('layouts.footer')
    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <script src="{{ asset('js/beedle.js') }}"></script>
    <script src="{{ asset('js/webby.js') }}"></script>
    <script>
        toastr.options = {
            positionClass: "toast-bottom-right",
            timeOut: 5000,
            closeButton: true,
            progressBar: true
        }
    </script>
    @foreach($errors->all() as $e)
    <script>
        toastr.error("{{$e}}")
    </script>
    @endforeach
    @if(Session::has('success'))
    <script>
        toastr.success("Datos guardados");
    </script>
    @endif
    @if(Session::has('danger'))
    <script>
        toastr.error("{{Session::get('danger')}}");
    </script>
    @endif
    @yield('scripts')
</body>

</html>