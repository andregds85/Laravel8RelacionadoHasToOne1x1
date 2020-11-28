@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Pacientes</h2>
            </div>

            <div class="pull-right">
                @can('pacientes-create')
                <a class="btn btn-success" href="{{ route('pacientes.create') }}"> Novo Paciente</a>
                @endcan
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>x</th>
            <th>Nome</th>
            <th>categoria_id</th>
            <th width="280px">Ação</th>
        </tr>
	    @foreach ($pacientes as $paciente)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $paciente->solicitacao}}</td>
	        <td>{{ $paciente->categoria_id}}</td>
	        <td>
                <form action="{{ route('pacientes.destroy',$paciente->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('pacientes.show',$paciente->id) }}">Mostrar</a>
                    @can('paciente-edit')
                    <a class="btn btn-primary" href="{{ route('pacientes.edit',$paciente->id) }}">Editar</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('paciente-delete')
                    <button type="submit" class="btn btn-danger">Deletar</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


    {!! $pacientes->links() !!}


<p class="text-center text-primary"><small>Laravel</small></p>
@endsection
