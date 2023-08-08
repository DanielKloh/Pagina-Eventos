<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonte do Google -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

        <!-- CSS Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        
        <!-- CSS da aplicação -->
        <link rel="stylesheet" href="/css/style.css">
    </head>

    <header>
      <nav class="navbar navbar-expand-lg navbar-light nav">
        <div class="collapse navbar-collapse" id="navbar">
          <a href="/" class="navbar-brand">
            <img src="/img/iconProjeto.png" alt="Daniel Events">
          </a>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="/" class="nav-link">Eventos</a>
            </li>
            <li class="nav-item">
              <a href="/event/create" class="nav-link">Criar Eventos</a>
            </li>
            @auth
            <li class="nav-item">
              <a href="/dashboard" class="nav-link">Meus eventos</a>
            </li>
            <li class="nav-item">
              <a href="/profile" class="nav-link">Meu perfil</a>
            </li>
            <li class="nav-item">
              <form action="/logout" method="POST">
                @csrf
                <a href="/logout" 
                  class="nav-link" 
                  onclick="event.preventDefault();
                  this.closest('form').submit();">
                  Sair
                </a>
              </form>
            </li>
            @endauth
            @guest
            <li class="nav-item">
              <a href="/login" class="nav-link">Entrar</a>
            </li>
            <li class="nav-item">
              <a href="/register" class="nav-link">Cadastrar</a>
            </li>
            @endguest
          </ul>
        </div>
      </nav>
    </header>


    <body>
      <main>
       
        <div class="container-fluid">
          <div class="row">
            @if (session("msg"))
            <p class="msg">{{session("msg")}}</p>
            @endif
          </div>  
        </div>

        @yield('content')

      </main>

      <footer>
        <p>Daniel Events &copy; 2023</p>
      </footer>
    </body>
    <script src="/js/scripts.js"></script>
</html>