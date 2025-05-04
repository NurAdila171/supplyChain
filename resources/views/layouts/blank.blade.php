<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ config('app.name') }}</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700"/>

    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-XtG3vbwet9n/3GofQV/ox6+JbLXzX6fQtRYtBpyW/X0OF4E73NRePgKZ1fsVvLSr/EQ4T+zgFBL2BC0pOBOs9g==" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js" integrity="sha512-7hGr4JFYpUisL7kR9W5BBiU0A2J8x1SzT8JvhFsKd4V57A4ZAvV63ZnsK6sF6Sc7D6R4/kKeA3xhUdqgHvO7Iw==" crossorigin="anonymous"></script>

</head>


<body id="kt_body" class="app-blank">

@yield('content')

<script src="{{ asset('/assets/js/scripts.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap%405.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>

<script src="{{ asset('assets/js/sb-customizer.js') }}"></script>
<sb-customizer project="sb-ui-kit-pro"></sb-customizer>

</body>
</html>
