@extends('layouts.main')

@section('title', 'Cadastrar Categoria')

@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/categories/dashboard"> <i class="bi bi-speedometer"></i> Categorias </a></li>
    <li class="breadcrumb-item active" aria-current="page"> Cadastrar Categoria</li>
  </ol>
</nav>
<h1>Cadastrar Categoria</h1>
  <form action="/categories" method="POST" enctype="multipart/form-data">
    @csrf               {{--DIRETIVA SALVAR DADOS NO BANCO--}}

    <div class="form-group">
      <label for="name_category">Nome Categoria:</label>
      <input type="text" class="form-control" id="name_category" name="name_category" placeholder="Nome da Categoria" required>
    </div>
    
    <input type="submit" class="btn btn-success" value="Cadastrar Categoria">
  </form>
@endsection