@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Categoria</h2>
            </div>
            <div class="pull-right">
                @can('categoria-create')
                <a class="btn btn-success" href="{{ route('categorias.create') }}"> Nova Categoria</a>
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
            <th>Cnes</th>
            <th width="280px">Ação</th>
        </tr>
	    @foreach ($categorias as $categoria)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $categoria->name }}</td>
	        <td>{{ $categoria->cnes }}</td>
	        <td>
                <form action="{{ route('categorias.destroy',$categoria->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('categorias.show',$categoria->id) }}">Mostrar</a>
                    @can('categoria-edit')
                    <a class="btn btn-primary" href="{{ route('categorias.edit',$categoria->id) }}">Editar</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('categoria-delete')
                    <button type="submit" class="btn btn-danger">Deletar</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


    {!! $categorias->links() !!}
        {!! $categorias->links() !!}


<p class="text-center text-primary"><small>Laravel</small></p>
@endsection
