<?php

namespace App\Http\Controllers;

use App\Models\Pacientes;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoriaController;


class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:pacientes-list|pacientes-create|pacientes-edit|pacientes-delete', ['only' => ['index','show']]);
         $this->middleware('permission:pacientes-create', ['only' => ['create','store']]);
         $this->middleware('permission:pacientes-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:pacientes-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes = Pacientes::latest()->paginate(5);
        return view('pacientes.index',compact('pacientes'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pacientes.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'categorias_id' => 'required',
            'solicitacao' => 'required',
            'cns' => 'required',
            'nomedousuario' => 'required',
            'municipio' => 'required',
            'unidadedesejada' => 'required',
            'codigo' => 'required',
            'observacao1' => 'required',
            'observacao2' => 'required',
          ]);


        Pacientes::create($request->all());

        return redirect()->route('pacientes.index')
                        ->with('Sucesso','Paciente Criado com Sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Pacientes $paciente)
    {
        return view('pacientes.show',compact('paciente'));




    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Pacientes $paciente)
    {
        return view('pacientes.edit',compact('paciente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pacientes $paciente)
    {
         request()->validate([
            'categorias_id' => 'required',
            'solicitacao' => 'required',
            'cns' => 'required',
            'nomedousuario' => 'required',
            'municipio' => 'required',
            'unidadedesejada' => 'required',
            'codigo' => 'required',
            'observacao1' => 'required',
            'observacao2' => 'required',
          ]);



        $paciente->update($request->all());

        return redirect()->route('pacientes.index')
                        ->with('Sucesso','Paciente Atualizado com Sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pacientes $paciente)
    {
        $$paciente->delete();

        return redirect()->route('pacientes.index')
                        ->with('Sucesso','Paciente Deletado com Sucesso');
    }
}
