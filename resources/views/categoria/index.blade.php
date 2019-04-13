@extends('layout.app')
@section('content')




<div class="card">
  <div class="card-body">
    @if($categoria->id  == "")
  <form action="categoria" method="POST">
    @else
    {{ Form::model('', array('route' => array('categoria.update', $categoria->id), 'method' => 'PUT')) }}
    @endif
  @csrf
  <div class="form-group">
      <input type="hidden"  value="{{$categoria->id}}">
    <label>Nome da Categoria</label>
    <input type="text" class="form-control" name="nome" aria-describedby="emailHelp" value="{{$categoria->nome}}" placeholder="Nome da Categoria">
    
  </div>
   @if($categoria->id == "")
  <button type="submit" class="btn btn-primary">Cadastrar</button>
  @else
  <button type="submit" class="btn btn-primary">Atualizar</button>
  @endif
</form>
  </div>
</div>


<br>

<div class="card">
  <div class="card-body">
   
    <table class="table table-bordered">
  
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Excluir</th>
      <th scope="col">Editar</th>
    </tr>
  
  @foreach($categorias as $categoria)
    <tr>
      <th scope="row">{{$categoria->id}}</th>
      <td>{{$categoria->nome}}</td>
      <td> 
      
        {{Form::open(['route'=>['categoria.edit',$categoria->id], 'method'=>'GET'])}}
           {{Form::submit('Editar', ['class'=>'btn btn-info btn-sm col-md-12'] )}}
  			{{Form::close()}}
      
      </td>
      <td> 
      {{Form::open(['route'=>['categoria.destroy',$categoria->id], 'method'=>'DELETE'])}}
           {{Form::submit('Excluir', ['class'=>'btn btn-danger btn-sm col-md-12'] )}}
  			{{Form::close()}}
  			</td>
    </tr>
    @endforeach
    </table>
  </div></div>






@stop