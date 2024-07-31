<?php
    use Illuminate\Support\Facades\Auth;
    $user = Auth::user();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    @include('layouts.libaries.styles')

    <style>
        .navbar {
            background-color: black;
            color: white;
            border-bottom: 1px solid #dee2e6;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1050;
            width: 100%;
            display: flex;
            justify-content: space-between;
        }

        .navbar .navbar-brand {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            font-size: 1.25rem;
            color: white;
        }

        .navbar .nav-item .nav-link {
            color: white;
        }

        .navbar .dropdown-menu {
            background-color: #ffffff;
            border: 1px solid #dee2e6;
        }

        .navbar .dropdown-menu .dropdown-item {
            color: #6c757d;
        }

        .navbar .dropdown-menu .dropdown-item:hover {
            color: #000;
            background-color: #f8f9fa;
        }

        .navbar-toggler {
            border: none;
            background-color: #6c757d;
            padding: 5px 10px;
        }

        .navbar-toggler:focus {
            outline: none;
        }

        .burger {
            cursor: pointer;
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .burger span {
            background: #6c757d;
            height: 4px;
            border-radius: 2px;
        }

        /* Ensure main content is not hidden behind the fixed navbar */
        .container-fluid {
            margin-top: 70px;
            margin-left:0px;
        }

        .content {
            padding: 0px;
            font-family: 'Verdana', sans-serif;
            background-color:#36454F;
            margin:0px;
        }

        /* Styles for logout button */
        .logout-btn {
            display: flex;
            align-items: center;
            color: #333;
            font-size: 16px;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }

        .logout-btn:hover {
            background-color: #f2f2f2;
            color: #000;
        }

        .logout-btn i {
            margin-right: 10px;
        }
    </style>
</head>
<body>
<nav class="main-header navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="#">
        <img src="{{ asset('logo.png') }}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8; width: 120px; height: 25px;">
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-light {{ Request::is('/') ? 'active' : '' }}" href="/">Home</a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            @if($user)
                <li class="nav-item">
                <a class="dropdown-item logout-btn text-light" href="{{ route('login') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                             Logout
                        </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profileDropdown">
                        
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('login') }}">Login</a>
                </li>
            @endif
        </ul>
    </div>
</nav>

<div class="container-fluid">
    <main class="content">
        @yield('content')
    </main>
</div>

@include('layouts.libaries.scripts')
</body>
</html>
