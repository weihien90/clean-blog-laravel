<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="My Blog">
    <meta name="author" content="WeiHien">

    <title>My Blog {{ isset($title) ? "| $title" : "" }}</title>

    <!-- Bootstrap & Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/fontawesome/4.6.3/css/font-awesome.min.css">

    <!-- Clean Blog CSS -->
    <link href="{{ asset('css/clean-blog.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navbar -->
    @include('layouts.navbar')

    <!-- Content -->
    @yield('content')

    <hr>

    <!-- Footer -->
    @include('layouts.footer')

    <!-- jQuery & Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/g/jquery@3.1.0,bootstrap@3.3.7"></script>

    <!-- Clean Blog JavaScript -->
    <script src="{{ asset('js/clean-blog.min.js') }}"></script>

</body>

</html>
