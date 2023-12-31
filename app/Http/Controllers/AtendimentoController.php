<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Atendimento;
use App\Models\Cliente;
use App\Models\Plano;
use App\Models\Setor;

class AtendimentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $atendimentos = Atendimento::all();

        return view('atendimento.list')->with(['atendimentos'=> $atendimentos]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = Cliente::orderBy('nome')->get();
        $setores = Setor::orderBy('nome')->get();

        return view('atendimento.form')->with([
            'clientes'=> $clientes,
            'setores'=> $setores,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tipo'=>'required',
            'descricao'=>'required',
            'data'=>'required',
            'hora'=>'required',
            'setor_id'=>'required',
            'cliente_id'=>'required',
        ],[
            'tipo.required'=>"É obrigatório preencher o campo :attribute!",
            'tipo.max'=>"É permitido até 60 caracteres em :attribute !",
            'descricao.required'=>"É obrigatório preencher o campo :attribute!",
            'descricao.max'=>"É permitido até 200 caracteres em :attribute !",
            'data.required'=>"É obrigatório preencher o campo :attribute!",
            'data.max'=>"É permitido até 15 caracteres em :attribute !",
            'hora.required'=>"É obrigatório preencher o campo :attribute!",
            'hora.max'=>"É permitido até 15 caracteres em :attribute !",
            'setor_id.required'=>"É obrigatório preencher o campo :attribute!",
            'cliente_id.required'=>"É obrigatório preencher o campo :attribute!",
        ]); 
 
        $dados = ['tipo'=>$request->tipo,
        'descricao'=>$request->descricao,
        'data'=>$request->data,
        'hora'=>$request->hora,
        'setor_id'=>$request->setor_id,
        'cliente_id'=>$request->cliente_id,
        ];

        Atendimento::create($dados); //ou  $request->all()

        return redirect('atendimento')->with('success', "Cadastrado com sucesso!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $atendimento = Atendimento::find($id); //select * from atendimento where id = $id

        $clientes = Cliente::orderBy('nome')->get();
        $setores = Setor::orderBy('nome')->get();

        return view('atendimento.form')->with([
            'atendimento'=> $atendimento,
            'clientes'=> $clientes,
            'setores'=> $setores,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tipo'=>'required',
            'descricao'=>'required',
            'data'=>'required',
            'hora'=>'required',
            'setor_id'=>'required',
            'cliente_id'=>'required',
        ],[
            'tipo.required'=>"É obrigatório preencher o campo :attribute!",
            'tipo.max'=>"É permitido até 60 caracteres em :attribute !",
            'descricao.required'=>"É obrigatório preencher o campo :attribute!",
            'descricao.max'=>"É permitido até 200 caracteres em :attribute !",
            'data.required'=>"É obrigatório preencher o campo :attribute!",
            'data.max'=>"É permitido até 15 caracteres em :attribute !",
            'hora.required'=>"É obrigatório preencher o campo :attribute!",
            'hora.max'=>"É permitido até 15 caracteres em :attribute !",
            'setor_id.required'=>"É obrigatório preencher o campo :attribute!",
            'cliente_id.required'=>"É obrigatório preencher o campo :attribute!",
        ]); 

        $dados = ['tipo'=>$request->tipo,
        'descricao'=>$request->descricao,
        'data'=>$request->data,
        'hora'=>$request->hora,
        'setor_id'=>$request->setor_id,
        'cliente_id'=>$request->cliente_id,
        ];

        Atendimento::updateOrCreate(
            ['id'=>$request->id],
            $dados);

        return redirect('atendimento')->with('success', "Atualizado com sucesso!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $atendimento = Atendimento::findOrFail($id);

        $atendimento->delete();

        return redirect('atendimento')->with('success', "Removido com sucesso!");
    }

    public function search(Request $request)
    {
        if(!empty($request->valor)){
            $atendimentos = Atendimento::where(
                $request->tipo,
                 'like' ,
                "%". $request->valor."%"
                )->get();
        } else {
            $atendimentos = Atendimento::all();
        }

        return view('atendimento.list')->with(['atendimentos'=> $atendimentos]);
    }
}
