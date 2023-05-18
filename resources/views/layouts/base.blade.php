<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon"/>
    <!-- Icon - IconMonster -->
    <link rel="stylesheet" href="https://cdn.iconmonstr.com/1.3.0/css/iconmonstr-iconic-font.min.css"/>
    <!-- Mumble UI -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('uikit/styles/uikit.css') }}"/>
    <!-- Dev Search UI -->
    <link rel="stylesheet" href="{{ asset('styles/app.css') }}"/>

    <title>DevSearch - Connect with Developers!</title>
</head>

<body>
@include('includes.navbar')
@yield('content')
</body>
