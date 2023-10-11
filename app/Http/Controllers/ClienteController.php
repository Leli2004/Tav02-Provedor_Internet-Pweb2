<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Plano;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::all();

        return view('cliente.list')->with(['clientes'=> $clientes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $planos = Plano::orderBy('nome')->get();

        return view('cliente.form')->with(['planos'=> $planos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /*$request->validate([
            'nome'=>'required',
        ],[
            'nome.required'=>"O :attribute é obrigatório!",
            'nome.max'=>" Só é permitido 120 caracteres em :attribute !",
        ]); */

        $dados = ['nome'=>$request->nome,
            'cpf'=>$request->cpf,
            'data_nascimento'=>$request->data_nascimento,
            'endereco'=>$request->endereco,
            'plano_id'=>$request->plano_id,
        ]; 

        Cliente::create($dados);

        return redirect('cliente')->with('success', "Cadastrado com sucesso!");
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
        $cliente = Clientes::find($id); // select * from colaborador where id = $id

        $planos = Plano::orderBy('nome')->get();

        return view('cliente.form')->with([
        'cliente'=> $cliente,
        'planos'=> $planos]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        /*$request->validate([
            'nome'=>'required',
        ],[
            'nome.required'=>"O :attribute é obrigatório!",
            'nome.max'=>" Só é permitido 120 caracteres em :attribute !",
        ]); */

        $dados = ['nome'=>$request->nome,
            'cpf'=>$request->cpf,
            'data_nascimento'=>$request->data_nascimento,
            'endereco'=>$request->endereco,
            'plano_id'=>$request->plano_id,
        ]; 

        Cliente::UpdateOrCreate(
            ['id'=>$request->id],
            $dados);

        return redirect('cliente')->with('success', "Atualizado com sucesso!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);

        $cliente->delete();

        return redirect('cliente')->with('success', "Deletado com sucesso!");
    }

    /**
    * Pesquisa e filtra o registro do banco de dados
     */
    public function search(Request $request)
    {
        if(!empty($request->valor)){
            $clientes = Cliente::where($request->tipo, 'like', "%". $request->valor."%")->get();
        } else {
            $clientes = Cliente::all();
        }
        return view('cliente.list')->with(['clientes'=> $clientes]);
    }
}