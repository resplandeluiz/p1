@extends('layout.app')
@section('content')




<div class="card">
  <div class="card-body">
    @if($pagamento->id  == "")
  <form action="pagamento" method="POST">
    @else
    {{ Form::model('', array('route' => array('pagamento.update', $pagamento->id), 'method' => 'PUT')) }}
    @endif
  @csrf
  
  <div class="form-group">
      
      <input type="hidden"  value="{{$pagamento->id}}">
      
  
    
     <label>Data</label>
    <input type="text" class="form-control" name="data" aria-describedby="emailHelp" value="{{$pagamento->data}}" placeholder="Nome da Categoria">
    
     <label>Descrição</label>
    
    <textarea class="form-control" name="descricao" aria-describedby="emailHelp" placeholder="O que você ta pagando ?">
      {{$pagamento->descricao}}
      
    </textarea>
     
     <label>Valor</label>
    <input type="text" class="form-control" name="valor" aria-describedby="emailHelp" value="{{$pagamento->valor}}"  placeholder="Quanto foi ?">
    
    <label>Categorias</label>
    <select class="form-control" name="categoria_id">
      @if($pagamento->id != null)
       <option value="{{$pagamento->categoria_id}}">{{$pagamento->categoria->nome}}</option>
       @endif
        @foreach($categorias as $categoria)
        <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
        @endforeach
        
    </select>
    
    
  </div>
   @if($pagamento->id == "")
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
      <th scope="col">Data</th>
      <th scope="col">Categoria</th>
      <th scope="col">Descrição</th>
      <th scope="col">Valor</th>
      <th scope="col">Editar</th>
      <th scope="col">Excluir</th>
    </tr>
  
  @foreach($pagamentos as $pagamento)
    <tr>
      <th scope="row">{{$pagamento->id}}</th>
      <td>{{$pagamento->data}}</td>
      <td>{{$pagamento->categoria->nome}}</td>
      <td>{{$pagamento->descricao}}</td>
      <td>{{$pagamento->valor}}</td>
      <td> 
      
        {{Form::open(['route'=>['pagamento.edit',$pagamento->id], 'method'=>'GET'])}}
           {{Form::submit('Editar', ['class'=>'btn btn-info btn-sm col-md-12'] )}}
  			{{Form::close()}}
      
      </td>
      <td> 
      {{Form::open(['route'=>['pagamento.destroy',$pagamento->id], 'method'=>'DELETE'])}}
           {{Form::submit('Excluir', ['class'=>'btn btn-danger btn-sm col-md-12'] )}}
  			{{Form::close()}}
  			</td>
    </tr>
    @endforeach
    </table>
  </div></div>






@stop