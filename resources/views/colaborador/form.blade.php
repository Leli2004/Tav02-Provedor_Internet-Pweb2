
@extends('base.app')
@section("titulo", 'Formulário de Colaboradores')
@section('content')

    @if($errors->any())
        <ul>
            @foreach ($errors->all() as $error )
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
    @php
        if(!empty($colaborador->id)){
            $route = route('colaborador.update', $colaborador->id);
        } else{
            $route = route('colaborador.store');
        }
    @endphp

    <div>
        <div>
        <h3>Cadastrar Colaborador</h3>

        <form action="{{ $route }}" method="post" enctype="multipart/form-data">
            @csrf <!-- cria um hash de segurança -->

            @if (!empty($colaborador->id))
                @method('PUT')
            @endif

            <input type="hidden" name="id" value="@if (!empty($colaborador->id)){{$colaborador->id}}@elseif(!empty(old('id'))){{old('id')}}@else{{''}}@endif">

            <div>
                <div>
                    <label>
                        <span>Nome</span>
                        <input type="text" name="nome" placeholder="Nome do Colaborador" 
                        value="@if(!empty($colaborador->nome)){{$colaborador->nome}}@elseif(!empty(old('nome'))){{old('nome')}}@else{{''}}@endif">
                    </label>
                </div>
                <div>
                    <label>
                        <span>Função</span>
                        <input type="text" name="funcao" placeholder="Função do Colaborador" 
                        value="@if(!empty($colaborador->funcao)){{$colaborador->funcao}}@elseif(!empty(old('funcao'))){{old('funcao')}}@else{{''}}@endif">
                    </label>
                </div>
            </div><br><br>

            <label>
                <span>Setor</span>
                <select name="setor_id" id="">
                    @foreach ($setores as $item)
                        <option value="{{ $item->id }}"
                            @if(!empty($colaborador->id)){{ ( $item->id == $colaborador->setor_id) ? 'selected' : '' }}
                            @else{{ '' }}@endif >{{$item->nome}}
                        </option>
                    @endforeach
                </select>
            </label><br><br>

            @php
               $nome_imagem = !empty($aluno->imagem) ? $aluno->imagem : 'sem_imagem.jpg';
            @endphp
            <div>
                <img class="h-40 w-40 object-cover rounded-full" src="/storage/{{ $nome_imagem }}" width="300px"
                    alt="imagem">
                <br>
                <input
                    class="block w-full text-sm text-slate-500
                            file:mr-4 file:py-2 file:px-4
                            file:rounded-full file:border-0
                            file:text-sm file:font-semibold
                            file:bg-green-50 file:text-green-700
                            hover:file:bg-green-100"
                    type="file" name="imagem"><br>
                </div>

            <button type="submit">Salvar</button>
            <a href="{{ route('colaborador.index') }}"><button type="button">Voltar</button></a>
        </form>
    </div>
    </div>
@endsection