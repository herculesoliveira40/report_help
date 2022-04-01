<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="icon" href="/img/deadpool-logo.png" sizes="42x42" type="image/png">

  <title>@yield('title')</title>

  <!-- CSS e JS Interno -->
  <link rel="stylesheet" href="/css/bootstrap.min.css">
  <script type="text/javascript" src="/js/bootstrap.min.js"></script>

  <!-- Icones Bootstrap CDN-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

  <!-- Jquery Interno, Mask CDN -->
  <script src="/js/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
</head>

<body class="antialiased">
  <nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="/home" >
        <img src="/img/deadpool-logo.png" alt="" width="60" height="48">
      </a>
      <a class="navbar-brand" href="/home" style="color:#9c7211">Report</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          @guest
          <li class="nav-item">
            <a class="nav-link" href="/localization">Lozalização</a>
          </li>
          @endguest

          @auth
          
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:#9c7211">
              Cadastrar
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="/demands/create">Demanda</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="/categories/create">Categoria</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="/users/create">Usuario</a></li>
            </ul>
          </li>
          
          @if (Auth::user()->profile == 0) {{-- Mostrar Cadastrar se Profile = adminstrador --}}
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:#9c7211">
              Dashboards
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="/demands/dashboard">Demanda</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="/categories/dashboard">Categoria</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="/users/dashboard">Usuario</a></li>
            </ul>
          </li>
          @endif
          @endauth

          @auth
          <li class="nav-item">
            <!-- Button trigger modal -->
            <button type="button" class="nav-link btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Sair <i class="bi bi-door-open-fill"></i>
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Escolha a opção desejada: </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="alert alert-warning" role="alert">
                      Tem certeza que quer sair? ;-;
                    </div>
                  </div>
                  <div class="modal-footer">
                    <a class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</a>
                    <form action="/logout" method="POST">
                      @csrf
                      <a href="/logout" class="btn btn-danger" onclick="event.preventDefault(); this.closest('form').submit();">
                        Sair <i class="bi bi-door-open-fill"></i>
                      </a>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </li>
          @endauth


          @guest
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Entrar
          </button>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Escolha a opção desejada:</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <a href="/login" class="btn btn-primary">Login</a>
                </div>
                <div class="modal-footer">
                  <a href="/login" class="btn btn-primary">Já tem conta?</a>
                  <a href="/register" class="btn btn-success">Cadastre-se</a>
                </div>
              </div>
            </div>
          </div>
          @endguest
        </ul>
      </div>
    </div>
  </nav>

  <main>
    <div class="container-fluid">
      <div class="row">
        @if(session('mensagem'))
        <p class="alert alert-success">{{ session('mensagem') }}</p>

        @elseif(session('alerta'))
        <p class="alert alert-danger">{{ session('alerta') }}</p>
        @endif

        @yield('content')
      </div>
    </div>
  </main>



  <footer class="text-center bg-secondary text-light">
    <p> </p>
    <p> 2022 <a href="https://github.com/herculesoliveira40" target="_blank"> Shelby &copy;</a> </strong> </p>
  </footer>
</body>
<script type="text/javascript" src="/js/script_modal.js"></script>

</html>