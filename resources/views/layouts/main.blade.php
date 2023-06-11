<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Prompt:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

        <!-- Bootstrap Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

        <!-- CSS -->
        <link rel="stylesheet" href="/css/styles.css">

    </head>
    <body class="antialiased">
        <header>
            <nav class="navbar navbar-expand-lg navbar-light p-2">
                <div class="collapse navbar-collapse" id="navbar">
                    <a href="" class="navbar-brand">
                        <img width="50" src="/img/hdcevents_logo.svg" alt="logo-simpls">
                    </a>
                    <ul class="navbar-nav">
                        <li class="navbar-item">
                            <a href="/" class="nav-link">Eventos</a>
                        </li>
                        <li class="navbar-item">
                            <a href="/events/create" class="nav-link">Criar Eventos</a>
                        </li>
                        <li class="navbar-item">
                            <a href="/contact" class="nav-link">Contatos</a>
                        </li>
                        @auth
                        <li class="navbar-item">
                            <a href="/dashboard" class="nav-link">Meus eventos</a>
                        </li>
                        <li class="navbar-item">
                            <form action="/logout" method="POST">
                                @csrf
                                <a 
                                href="/logout" 
                                class="nav-link" 
                                onclick="event.preventDefault();
                                         this.closest('form').submit();" >Sair</a>
                            </form>
                        </li>
                        @endauth
                        @guest
                        <li class="navbar-item">
                            <a href="/login" class="nav-link">Entrar</a>
                        </li>
                        <li class="navbar-item">
                            <a href="/register" class="nav-link">Cadastrar</a>
                        </li>
                        @endguest
                    </ul>
                </div>
            </nav>
        </header>
        <main>
            <div class="container-fuild">
                <div class="row">
                    @if(session('msg'))
                    <p class="msg">{{ session('msg') }}</p>
                    @endif
                    
                    @yield('content')
                </div>
            </div>
        </main>
        <footer>
            <p>HDC Events &copy; 2023</p>
        </footer>
    </body>
</html>
