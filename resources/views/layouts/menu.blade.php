@extends('layouts.header')

<header class="header-area">
        <div class="navgition navgition-transparent">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="#">
                                <img src="assets/images/simrekalogo.png" alt="Logo">
                            </a>

                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarOne"
                                aria-controls="navbarOne" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarOne">
                                <ul class="navbar-nav m-auto">
                                    <li class="nav-item active">
                                        <a class="page-scroll" href="{{ '/home' }}">HOME</a>
                                    </li>
                                    @if (Route::has('login'))
                                        <li class="nav-item">
                                            @auth
                                            <li class="nav-item">
                                                <a class="page-scroll" href="{{ 'add-blog' }}">Add Blog</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="page-scroll" href="{{ 'all-blog' }}">List of Blogs</a>
                                            </li>
                                        @else
                                            <a class="page-scroll" href="{{ route('login') }}">Login</a>
                                            </li>
                                            @if (Route::has('register'))
                                                <li class="nav-item">
                                                    <a class="page-scroll" href="{{ route('register') }}">Register</a>
                                                </li>
                                            @endif
                                        @endauth
                                    @endif

                                </ul>
                            </div>

                        </nav> <!-- navbar -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- navgition -->

        <div id="home" class="header-hero bg_cover" style="background-image: url(assets/images/header.jpg)">
            <div class="header-shape">
                <img src="assets/images/header-shape.svg" alt="shape">
            </div>
        </div>
    </header>
