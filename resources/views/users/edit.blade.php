@extends('layouts.main')

@section('title', 'Editar Usuario')

@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/users/dashboard"> <i class="bi bi-speedometer"></i> Usuarios </a></li>
    <li class="breadcrumb-item active" aria-current="page"><i class="bi bi-pencil-square"></i> Editar Usuario: {{$user->id}}</li>
  </ol>
</nav>
<h1>Editar Usuario</h1>
  <form action="/users/update/{{ $user->id }}" method="POST" enctype="multipart/form-data">
    
    @csrf               {{--DIRETIVA SALVAR DADOS NO BANCO--}}
    @method('PUT')
    <div class="form-group">
      <label for="name">Nome Usuario:</label>
      <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
    </div>
    <div class="form-group">
      <label for="email">Email Usuario:</label>
      <input type="mail" class="form-control" id="email" name="email" value="{{ $user->email}}" >
    </div>
    <div class="form-group">
      <label for="password">Senha:</label>
      <input type="password" class="form-control" id="password" name="password">
    </div>
    <div class="form-group">
    <label for="profile">Perfil</label>
      <select name="profile" id="profile" class="form-control">
        <option value="0" >Administrador</option>
        <option value="1" {{ $user->profile == 1 ? "selected='selected'" : ""}}>Visualizador</option>
      </select>
    </div>




    <input type="submit" class="btn btn-success" value="Editar Usuario">
  </form>
@endsection