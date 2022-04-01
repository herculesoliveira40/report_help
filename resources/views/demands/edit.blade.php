@extends('layouts.main')

@section('title', 'Editar Demanda')

@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/users/dashboard"> <i class="bi bi-speedometer"></i> Demandas </a></li>
    <li class="breadcrumb-item active" aria-current="page"><i class="bi bi-pencil-square"></i> Editar demanda: {{$demand->id}}</li>
  </ol>
</nav>
<h1>Editar Demanda</h1>
  <form action="/demands/update/{{ $demand->id }}" method="POST" enctype="multipart/form-data">
    
    @csrf               {{--DIRETIVA SALVAR DADOS NO BANCO--}}
    @method('PUT')

    <div class="form-group">
      <label for="categoria_id" class="form-label"> Categoria da demanda: </label>
      <select  name="category_id" id="category_id"  class="form-control">  
          @foreach ($categories as $category)
          <option value="{{$category->id}}" {{ $demand->category_id == ($loop->index +1) ? "selected='selected'" : ""}}>{{$category->name_category}}</option>
          @endforeach
      </select>  
    </div>
    <div class="form-group">
      <label for="title_demand">Titulo Demanda:</label>
      <input type="text" class="form-control" id="title_demand" name="title_demand" value="{{ $demand->title_demand }}">
    </div>
    <div class="form-group">
      <label for="description">Descrição:</label>
      <textarea name="description" id="description" class="form-control" placeholder="Descrição demanda"> {{ $demand->description }} </textarea>
    </div>
    <div class="form-group">
      <label for="status">Status:</label>
      <select name="status" id="status" class="form-control">
        <option value="1">Andamento</option>
        <option value="2" {{ $demand->profile == 1 ? "selected='selected'" : ""}}>Concluso</option>
      </select>
    </div>
    <div class="form-group">
      <label for="observation">Observações:</label>
      <textarea name="observation" id="observation" class="form-control" placeholder="Observação demanda"> {{ $demand->observation }} </textarea>
    </div>
    <div class="form-group">
      <label for="value">Valor cobrado:</label>
      <input type="number" class="form-control" id="value" name="value" value="{{ $demand->value}}" step=".01">
    </div>
    <div class="form-group">
      <label for="user_responsive" class="form-label"> Usuario Responsavel: </label>
      <select  name="user_responsive" id="user_responsive"  class="form-control">  
          @foreach ($users as $user)
          <option value="{{$user->id}}" {{ $demand->user_responsive == ($loop->index +1) ? "selected='selected'" : ""}}>{{$user->name}}</option>
          @endforeach
      </select>  
    </div>
    <input type="submit" class="btn btn-success" value="Editar demanda">
  </form>
@endsection
