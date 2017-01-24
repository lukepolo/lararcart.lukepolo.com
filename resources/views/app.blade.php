<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>{{ isset($title) ? $title . ' - ' : null }}LaraCart</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="description" content="LaraCart - A shopping cart for Laravel">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>

        @if (isset($canonical))
            <link rel="canonical" href="{{ url($canonical) }}" />
        @endif

        <!--[if lte IE 9]>
            <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <link rel="stylesheet" href="{{ elixir('css/app.css') }}">
    </head>
    <body class="language-php">

        <nav class="main">
            <div class="container">
                <a href="/" class="brand">
                    <img src="{{ asset('/img/laracart.png') }}" alt="LaraCart">
                </a>
            </div>
        </nav>

        <div class="container">
            <div class="col-sm-3">
                <nav class="side-menu" role="navigation">
                    <div class="side-docs-nav">
                        @yield('side-nav')
                    </div>
                </nav>
            </div>
            <div class="col-sm-9">
                @yield('content')
            </div>
        </div>

        <div class="footer text-center">
            <a target="_blank" href="https://lukepolo.com">LukePOLO.com</a>
        </div>

        <script src="{{ elixir('js/app.js') }}"></script>
    </body>
</html>