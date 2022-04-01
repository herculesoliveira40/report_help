@extends('layouts.main')

@section('title', 'Cadastrar Usuario')

@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/users/dashboard"> <i class="bi bi-speedometer"></i> Usuarios </a></li>
    <li class="breadcrumb-item active" aria-current="page"> Cadastrar Usuario</li>
  </ol>
</nav>
<h1>Cadastrar Usuario</h1>
  <form action="/users" method="POST" enctype="multipart/form-data">
    @csrf               {{--DIRETIVA SALVAR DADOS NO BANCO--}}

    <div class="form-group">
      <label for="name">Nome Usuario:</label>
      <input type="text" class="form-control" id="name" name="name" placeholder="Nome do Usuario" required>
    </div>
    <div class="form-group">
      <label for="email">Email Usuario:</label>
      <input type="mail" class="form-control" id="email" name="email" placeholder="Email Usuario" required>
    </div>
    <div class="form-group">
      <label for="password">Senha:</label>
      <input type="password" class="form-control" id="password" name="password" placeholder="********" required>
    </div>
    <div class="form-group">
    <label for="profile">Perfil</label>
      <select name="profile" id="profile" class="form-control">     
        <option value="1">Visualizador</option>
        <option value="0">Administrador</option>
      </select>
    </div>




    <input type="submit" class="btn btn-success" value="Cadastrar Usuario">
  </form>
@endsection