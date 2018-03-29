@extends('layouts.app')

@section('content')
    <pagina tamanho="12">
        <painel titulo="Artigos">
            <div class="row">
                @foreach($lista as $key => $value)
                    <artigo-card
                    titulo="{{str_limit($value->titulo, 25, "..." )}}"
                    descricao="{{str_limit($value->descricao, 40 , "...")}}"
                    link="{{route('artigo', [$value->id, str_slug($value->titulo)])}}"
                    imagem="https://www.oversodoinverso.com.br/wp-content/uploads/2013/10/filhotes-1.jpg"
                    data="{{$value->data}}"
                    autor="{{$value->autor}}"
                    sm="6"
                    md="4"></artigo-card>
                @endforeach
            </div>
        </painel>


    </pagina>
@endsection
