<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
    <title>@yield('title')</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport"
        content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <link rel="icon" href={{asset("images/logoo/icone.ico")}} type="image/x-icon">
    <!-- Stylesheets-->
    <link rel="stylesheet" type="text/css" href={{asset("//fonts.googleapis.com/css?family=Poppins:300,400,500")}}>
    <link rel="stylesheet" href={{asset("css/bootstrap.css")}}>
    <link rel="stylesheet" href={{asset("css/fonts.css")}}>
    <link rel="stylesheet" href={{asset("css/style.css")}}>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.0.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

@yield('style')
</head>

<body>
    @include('website.layouts.header')



    @yield('content')

    @include('website/layouts/footer')
    @yield('script')
    <script src={{asset("js/core.min.js")}}></script>
    <script src={{asset("js/script.js")}}></script>
    <!-- coded by Ragnar-->

</body>

</html>
