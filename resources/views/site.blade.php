@extends('layouts.app')

@section('content')
    <pagina tamanho="12">
        @if($errors->all())
            <div class="alert alert-danger alert-dismissible text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                @foreach ($errors->all() as $key => $value)
                    <li><strong>{{$value}}</strong></li>
                @endforeach
            </div>
        @endif
        <div class="form-inline">
            <modallink tipo="link" nome="adicionarBoard" titulo="Criar Board" css=""></modallink>
        </div>
        <painel titulo="Task's">
            <div class="row">
                @if(is_array($listaBoard) || is_object($listaBoard))
                    @foreach ($listaBoard as $item)
                        <board titulo="{{$item->titulo}}" id="{{$item->id}}" cor="">
                            @foreach ($listaTask as $key => $value)
                                @if($item->id == $value->board_id)
                                    <task id="{{$value->id}}" titulo="{{$value->titulo}}" username="{{$value->username}}" user_id="{{$value->user_id}}" editar="/task/" deletar="/task/" item="{{$value}}"></task>
                                @endif
                            @endforeach
                            <div class="form-inline">
                                @if($item->titulo == 'To Do')
                                    <modallink id="id"  item="item" url="/task/" tipo="link" nome="adicionarTask" titulo="Criar Task" css=""></modallink>
                                @endif
                            </div>
                        </board>
                    @endforeach
                @endif
            </div>
        </painel>

        <modal nome="adicionarBoard" titulo="Adicionar Board">
            <formulario id="formAdicionarBoard" css="" action="{{route('board.store')}}" method="post" enctype="" token="{{ csrf_token() }}">

                <div class="form-group">
                    <label for="titulo">Título</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título" value="{{old('titulo')}}">
                </div>
            </formulario>
            <span slot="botoes">
                <button form="formAdicionarBoard" class="btn btn-info">Adicionar</button>
            </span>
        </modal>

        <modal nome="adicionarTask" titulo="Adicionar Task">
            <formulario id="formAdicionar" css="" action="{{route('task.store')}}" method="post" enctype="" token="{{ csrf_token() }}">

                <div class="form-group">
                    <label for="titulo">Título</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título" value="{{old('titulo')}}">
                </div>

                <div class="form-group">
                    <label for="addDescricao">Descrição</label>

                    <ckeditor
                            id="addDescricao"
                            name="descricao"
                            value="{{old('descricao')}}"
                            v-bind:config="{
                    toolbar: [
                      [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript' ]
                    ],
                    height: 200
                  }" >
                    </ckeditor>

                </div>
                <div class="form-group">
                    <label for="user_id">Usuario</label>
                    <select class="form-control" name="user_id" id="user_id" v-model="$store.state.user_id">
                        @foreach ($listaUsuarios as $user)
                            <option value="{{$user->id}}" >{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>

            </formulario>
            <span slot="botoes">
                <button form="formAdicionar" class="btn btn-info">Adicionar</button>
            </span>
        </modal>

        <modal nome="editar" titulo="Editar">
            <formulario id="formEditar" v-bind:action="'/task/' + $store.state.item.id" method="put" enctype="" token="{{ csrf_token() }}">

                <div class="form-group">
                    <label for="titulo">Título</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" v-model="$store.state.item.titulo" placeholder="Título">
                </div>

                <div class="form-group">

                    <label for="editDescricao">Descrição</label>
                    <ckeditor
                            id="editDescricao"
                            name="descricao"
                            v-model="$store.state.item.descricao"
                            value="{{old('descricao')}}"
                            v-bind:config="{
                                    toolbar: [
                                      [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript' ]
                                    ],
                                    height: 200
                                  }" >
                    </ckeditor>
                </div>
                <div class="form-group">
                    <label for="board_id">Cartão</label>
                    <select class="form-control" name="board_id" id="board_id" v-model="$store.state.item.board_id">
                        @foreach ($listaBoard as $item)
                            <option value="{{$item->id}}" >{{$item->titulo}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="user_id">Usuario</label>
                    <select class="form-control" name="user_id" id="user_id" v-model="$store.state.user_id">
                        @foreach ($listaUsuarios as $user)
                            <option value="{{$user->id}}" >{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>
            </formulario>
            <span slot="botoes">
                <button form="formEditar" class="btn btn-info">Atualizar</button>
            </span>
        </modal>

        <modal nome="deletar" titulo="Delete">
            <form id="deletaForm" :action="'/task/' + $store.state.item.id" method="post">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <p>você tem certeza de que quer deletar essa Task ?</p>

            </form>
            <span slot="botoes">
                <button form="deletaForm" class="btn btn-danger">Delete</button>
            </span>
        </modal>

    </pagina>
@endsection
