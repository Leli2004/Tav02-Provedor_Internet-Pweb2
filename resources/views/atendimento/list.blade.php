@extends('base.app')
@section("titulo", 'Listagem de Atendimentos')
@section('content')

    <h3 class="pt-4 text-2xl font-medium py-4">Listagem de Atendimentos</h3> <br>
    <div class="flex">
        <div class="w-5/6">
            <form action="{{ route('atendimento.search') }}" method="post">
                @csrf
                <p>Filtrar por: </p>
                <select name="tipo">
                    <option value="cliente_id">Cliente</option>
                    <option value="setor_id">Setor</option>
                    <option value="tipo">Tipo</option>
                    <option value="descricao">Descrição</option>
                    <option value="data">Data</option>
                    <option value="hora">Hora</option>
                </select>
                <input type="text" name="valor">
                    <button
                        type="submit"
                        class="inline-block rounded border-2 border-slate-300 px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-primary transition duration-150 ease-in-out hover:border-slate-300 hover:bg-neutral-300 hover:text-primary-600 focus:border-primary-600 focus:text-primary-600 focus:outline-none focus:ring-0 active:border-primary-700 active:text-primary-700 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10">
                        Buscar
                    </button>
                    <a href="{{route('atendimento.index')}}">
                        <button
                        type="button"
                        class="inline-block rounded border-2 border-slate-300 px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-primary transition duration-150 ease-in-out hover:border-slate-300 hover:bg-neutral-300 hover:text-primary-600 focus:border-primary-600 focus:text-primary-600 focus:outline-none focus:ring-0 active:border-primary-700 active:text-primary-700 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10">
                        Limpar
                        </button>
                    </a>
            </form>
        </div>
        <div class="w-1/6 flex grid content-center float-right">
            <div>
                <br>
                <a href="{{route('atendimento.create')}}">
                    <button>
                    Cadastrar Novo
                    </button>
                </a>
            </div>
        </div>
    </div>

    <div>
        <div>
          <div>
            <div>
              <table>
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Setor</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Hora</th>
                    <th scope="col">Data</th>
                  </tr>
                </thead>
                @foreach ($atendimentos as $item)
                <tbody>
                  <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->cliente->nome ?? ""}}</td>
                    <td>{{$item->setor->nome ?? ""}}</td>
                    <td>{{$item->tipo}}</td>
                    <td>{{$item->descricao}}</td>
                    <td>{{$item->data}}</td>
                    <td>{{$item->hora}}</td>
                    <td>
                        <a href="{{route('atendimento.edit', $item->id)}}">
                            <button
                            type="button">
                            Editar
                            </button>
                        </a>
                        <a href="{{route('atendimento.destroy', $item->id)}}">
                            <button
                            onclick="return confirm('Deseja excluir o registro?')">
                            Deletar
                         </button>
                        </a>
                        <a href="#">
                            <button>
                            Alterar atendente
                         </button>
                        </a>
                    </td>
                  </tr>
                </tbody>
                @endforeach
              </table>
            </div>
          </div>
        </div>
      </div>
 @endsection