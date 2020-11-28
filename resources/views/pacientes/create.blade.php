@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Novo Paciente</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('pacientes.index') }}"> Voltar</a>
            </div>
        </div>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Ops!</strong> Houve algum erro na sua entrada<br><br>
            <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                     }  @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('pacientes.store') }}" method="POST">
    	@csrf

/* chama  a tabela categorias dentro da tabela pacientes */

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
                <label for="exampleInputEmail1">Categoria</label>
                <select class="form-control" name="categoria" id="categoria">

                <?php
                    use App\Models\Categoria;
                    $tabela = categoria::all();
                ?>

                @foreach($tabela as $item)
                <option value='{{$item->name}}' >{{$item->name}}</option>
                @endforeach

                </select>
            </div>
        </div>
</div>


/* fim do trecho de chamda de categorias */


         <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Nome:</strong>
		            <input type="text" name="name" class="form-control" placeholder="Entre com o nome">
                </div>


                <div class="form-group">
		            <strong>Cnes:</strong>
		            <input type="text" name="cnes" class="form-control" placeholder="Entre com o cnes">
                </div>


            </div>







		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		            <button type="submit" class="btn btn-primary">Cadastrar</button>
		    </div>
		</div>


    </form>



<p class="text-center text-primary"><small>Laravel</small></p>
@endsection
