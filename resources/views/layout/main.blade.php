<!DOCTYPE html>
<html>
<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="http://materializecss.com/dist/css/materialize.min.css"  media="screen,projection"/>
    <link rel="stylesheet" href="/css/app.css">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Email Sender</title>
</head>

<body>

    @include('layout.menu')

    <div class="container">

        @yield('content')

    </div>

    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="http://materializecss.com/dist/js/materialize.js"></script>
    <script src="/js/main.js"></script>
</body>
</html>