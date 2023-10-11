
@extends('base.app')
@section("titulo", 'Formulário de Atendimentos')
@section('content')

    @if($errors->any())
        <ul>
            @foreach ($errors->all() as $error )
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
    @php
        if(!empty($atendimento->id)){
            $route = route('atendimento.update', $atendimento->id);
        } else{
            $route = route('atendimento.store');
        }
    @endphp

    <div>
        <div>
        <h3>Cadastrar Atendimento</h3>

        <form action="{{ $route }}" method="post" enctype="multipart/form-data">
            @csrf <!-- cria um hash de segurança -->

            @if (!empty($atendimento->id))
                @method('PUT')
            @endif

            <input type="hidden" name="id" value="@if (!empty($atendimento->id)){{$atendimento->id}}@elseif(!empty(old('id'))){{old('id')}}@else{{''}}@endif">

            <label>
                <span>Cliente</span>
                <select name="cliente_id" id="">
                    @foreach ($clientes as $item)
                        <option value="{{ $item->id }}"
                            @if(!empty($atendimento->id)){{ ( $item->id == $atendimento->cliente_id) ? 'selected' : '' }}
                            @else{{ '' }}@endif >{{$item->nome}}
                        </option>
                    @endforeach
                </select>
            </label><br><br>

            <label>
                <span>Setor</span>
                <select name="setor_id" id="">
                    @foreach ($setores as $item)
                        <option value="{{ $item->id }}"
                            @if(!empty($atendimento->id)){{ ( $item->id == $atendimento->setor_id) ? 'selected' : '' }}
                            @else{{ '' }}@endif >{{$item->nome}}
                        </option>
                    @endforeach
                </select>
            </label><br><br>
            
            <div>
                <div>
                    <label>
                        <span>Tipo</span>
                        <input type="text" name="tipo" placeholder="Tipo de atendimento" 
                        value="@if(!empty($atendimento->tipo)){{$atendimento->tipo}}@elseif(!empty(old('tipo'))){{old('tipo')}}@else{{''}}@endif">
                    </label>
                </div>
                <div>
                    <label>
                        <span>Descição</span>
                        <input type="text" name="descricao" placeholder="Descrição de atendimento" 
                        value="@if(!empty($atendimento->descricao)){{$atendimento->descricao}}@elseif(!empty(old('descricao'))){{old('descricao')}}@else{{''}}@endif">
                    </label>
                </div>
            </div><br><br>

            <div>
                <div>
                    <label>
                        <span>Data</span>
                        <input type="text" name="data" placeholder="00/00/0000" 
                        value="@if(!empty($atendimento->data)){{$atendimento->data}}@elseif(!empty(old('data'))){{old('data')}}@else{{''}}@endif">
                    </label>
                </div>
                <div>
                    <label>
                        <span>Horário</span>
                        <input type="text" name="hora" placeholder="00:00" 
                        value="@if(!empty($atendimento->hora)){{$atendimento->hora}}@elseif(!empty(old('hora'))){{old('hora')}}@else{{''}}@endif">
                    </label>
                </div>
            </div> <br><br>

            <button type="submit">Salvar</button>
            <a href="{{ route('atendimento.index') }}"><button type="button">Voltar</button></a>
        </form>
    </div>
    </div>
@endsection