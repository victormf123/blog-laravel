@extends('layouts.app')

@section('content')
    <pagina tamanho="12">
        @if($errors->all())
            <div class="alert alert-danger alert-dismissible text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                @foreach($errors->all() as $key => $value)
                    <li><strong>{{$value}}</strong></li>
                @endforeach
            </div>
        @endif
        <painel titulo="Lista de Artigos">
            <migalhas :lista="{{$listaMigalhas}}"></migalhas>
            <tabela-lista
                    :titulos="['#','Título', 'Descrição', 'Data']"
                    :itens="{{$listaArtigos}}"
                    ordem="" ordemcol=""
                    criar="#criar" detalhe="/admin/artigos/" editar="/admin/artigos/" deletar="#deletar"
                    modal="sim"
            ></tabela-lista>

        </painel>
    </pagina>
    <modal nome="adicionar" titulo="Adicionar">
            <formulario id="formAdicionar" css="" action="{{route('artigos.store')}}" method="post" enctype="" token="{{csrf_token()}}">
                <div class="form-group">
                    <label for="titulo">Título</label>
                    <input type="text" class="form-control"  id="titulo" name="titulo" placeholder="Título" value="{{old('titulo')}}"/>
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <input type="text" class="form-control"  id="descricao" name="descricao" placeholder="" value="{{old('descricao')}}"/>
                </div>
                <div class="form-group">
                    <label for="conteudo">Conteúdo</label>
                    <textarea id="conteudo" class="form-control" name="conteudo">{{old('conteudo')}}</textarea>
                </div>
                <div class="form-group">
                    <label for="data">Data</label>
                    <input type="datetime-local" class="form-control"  id="data" name="data" placeholder="" value="{{old('data')}}"/>
                </div>

            </formulario>
            <span slot="botoes">
                <button form="formAdicionar" class="btn btn-info">Adicionar</button>
            </span>


    </modal>
    <modal nome="editar" titulo="Editar">
            <formulario id="formEditar" v-bind:action="'/admin/artigos/'+ $store.state.item.id" method="put" enctype="" token="{{csrf_token()}}">
                <div class="form-group">
                    <label for="titulo">Título</label>
                    <input type="text" class="form-control"  id="titulo" name="titulo" placeholder="Título" v-model="$store.state.item.titulo"/>
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <input type="text" class="form-control"  id="descricao" name="descricao" placeholder="" v-model="$store.state.item.descricao"/>
                </div>
                <div class="form-group">
                    <label for="conteudo">Conteúdo</label>
                    <textarea id="conteudo" class="form-control" name="conteudo" v-model="$store.state.item.conteudo"></textarea>
                </div>
                <div class="form-group">
                    <label for="data">Data</label>
                    <input type="datetime-local" class="form-control"  id="data" name="data" placeholder="" v-model="$store.state.item.data"/>
                </div>
            </formulario>
            <span slot="botoes">
                <button form="formEditar" class="btn btn-info">Atualizar</button>
            </span>
    </modal>

    <modal nome="detalhe" :titulo="$store.state.item.titulo">
            <p>@{{$store.state.item.descricao}}</p>
    </modal>

@endsection
