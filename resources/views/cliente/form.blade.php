
@extends('base.app')
@section("titulo", 'Formulário de Clientes')
@section('content')

    @if($errors->any())
        <ul>
            @foreach ($errors->all() as $error )
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
    @php
        if(!empty($cliente->id)){
            $route = route('cliente.update', $cliente->id);
        } else{
            $route = route('cliente.store');
        }
    @endphp

    <div>
        <div>
        <h3>Cadastrar Cliente</h3>

        <form action="{{ $route }}" method="post" enctype="multipart/form-data">
            @csrf <!-- cria um hash de segurança -->

            @if (!empty($cliente->id))
                @method('PUT')
            @endif

            <input type="hidden" name="id" value="@if (!empty($cliente->id)){{$cliente->id}}@elseif(!empty(old('id'))){{old('id')}}@else{{''}}@endif">

            <div>
                <div>
                    <label>
                        <span>Nome</span>
                        <input type="text" name="nome" placeholder="Nome do Cliente" 
                        value="@if(!empty($cliente->nome)){{$cliente->nome}}@elseif(!empty(old('nome'))){{old('nome')}}@else{{''}}@endif">
                    </label>
                </div>
                <div>
                    <label>
                        <span>CPF</span>
                        <input type="text" name="cpf" placeholder="000.000.000-00" 
                        value="@if(!empty($cliente->cpf)){{$cliente->cpf}}@elseif(!empty(old('cpf'))){{old('cpf')}}@else{{''}}@endif">
                    </label>
                </div>
            </div><br><br>

            <div>
            <div>
                <label>
                    <span>Data Nascimento</span>
                    <input type="text" name="data_nascimento" placeholder="00/00/0000" 
                    value="@if(!empty($cliente->data_nascimento)){{$cliente->data_nascimento}}@elseif(!empty(old('data_nascimento'))){{old('data_nascimento')}}@else{{''}}@endif">
                </label>
                </div>
            </div> <br><br>

            <div>
                <label>
                    <span>Endereço</span>
                    <input type="text" name="endereco" placeholder="Endereço do cliente" 
                    value="@if(!empty($cliente->endereco)){{$cliente->endereco}}@elseif(!empty(old('endereco'))){{old('endereco')}}@else{{''}}@endif">
                </label>
                </div>
            </div> <br><br>

            <label>
                <span>Plano</span>
                <select name="plano_id" id="">
                    @foreach ($planos as $item)
                        <option value="{{ $item->id }}"
                            @if(!empty($cliente->id)){{ ( $item->id == $cliente->plano_id) ? 'selected' : '' }}
                            @else{{ '' }}@endif >{{$item->nome}}
                        </option>
                    @endforeach
                </select>
            </label><br><br>

            <button type="submit">Salvar</button>
            <a href="{{ route('cliente.index') }}"><button type="button">Voltar</button></a>
        </form>
    </div>
    </div>
@endsection