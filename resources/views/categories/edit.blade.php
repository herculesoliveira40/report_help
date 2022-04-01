@extends('layouts.main')

@section('title', 'Editar Categoria')

@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/users/dashboard"> <i class="bi bi-speedometer"></i> Usuarios </a></li>
    <li class="breadcrumb-item active" aria-current="page"><i class="bi bi-pencil-square"></i> Editar Categoria: {{$category->id}}</li>
  </ol>
</nav>
<h1>Editar Categoria</h1>
  <form action="/categories/update/{{ $category->id }}" method="POST" enctype="multipart/form-data">
    
    @csrf               {{--DIRETIVA SALVAR DADOS NO BANCO--}}
    @method('PUT')
    <div class="form-group">
      <label for="name_category">Nome Categoria:</label>
      <input type="text" class="form-control" id="name_category" name="name_category" value="{{ $category->name_category }}">
    </div>
    
    <input type="submit" class="btn btn-success" value="Editar Usuario">
  </form>
@endsection