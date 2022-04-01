@extends('layouts.main')

@section('title', 'Cadastrar Demanda')

@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/demands/dashboard"> <i class="bi bi-speedometer"></i> Demandas </a></li>
    <li class="breadcrumb-item active" aria-current="page"> Cadastrar Demanda</li>
  </ol>
</nav>
<h1>Cadastrar Demanda</h1>
  <form action="/demands" method="POST" enctype="multipart/form-data">
    @csrf               {{--DIRETIVA SALVAR DADOS NO BANCO--}}

    <div class="form-group">
      <label for="categoria_id" class="form-label"> Categoria do Demanda: </label>
      <select  name="category_id" id="category_id"  class="form-control">  
          @foreach ($categories as $category)
          <option value="{{$category->id}}">{{$category->name_category}}</option>
          @endforeach
      </select>  
    </div>
    <div class="form-group">
      <label for="title_demand">Nome Demanda:</label>
      <input type="text" class="form-control" id="title_demand" name="title_demand" placeholder="Titulo da Demanda" required>
    </div>  
    <div class="form-group">
      <label for="description">Descrição:</label>
      <textarea name="description" id="description" class="form-control" placeholder="Descrição da Demanda"></textarea>
    </div>
    <div class="form-group">
      <label for="status">Status:</label>
      <select name="status" id="profile" class="form-control">
        <option value="0">Novo</option>
        <!-- <option value="1">Andamento</option>
        <option value="2">Concluso</option>  -->
      </select>
    </div>

    <input type="submit" class="btn btn-success" value="Cadastrar Demanda">
  </form>
@endsection