<template>
    <div class="">
        <div class="form-inline">
            <a v-if="criar && !modal" v-bind:href="criar">Criar</a>
            <modal-link v-if="criar && modal" tipo="button" nome="adicionar" titulo="Criar" css=""></modal-link>

            <div class="form-group pull-right">
                <input type="search" class="form-control" placeholder="Buscar" name="" v-model="buscar"/>{{buscar}}
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th style="cursor: pointer" v-on:click="ordenaColuna(index)" v-for="(titulo, index) in titulos">{{titulo}}</th>
                <th v-if="detalhe || editar || deletar">Ação</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(item, index) in lista">
                <td v-for="i in item">{{i}}</td>
                <td v-if="detalhe || editar || deletar">
                    <form v-bind:id="index" v-if="deletar && token" v-bind:action="deletar" method="post">
                        <input type="hidden" name="_method" value="DELETE"/>
                        <input type="hidden" name="_token" v-bind:value="token"/>

                        <a v-if="detalhe && !modal" v-bind:href="detalhe">Detalhe |</a>
                        <modal-link v-if="detalhe && modal" v-bind:item="item" v-bind:url="detalhe" tipo="button" nome="detalhe" titulo="Detalhe" css=""></modal-link>

                        <a v-if="editar && !modal" v-bind:href="editar">Editar |</a>
                        <modal-link v-if="editar && modal" v-bind:item="item" v-bind:url="editar" tipo="button" nome="editar" titulo="Editar |" css=""></modal-link>

                        <a href="#" v-on:click="executaForm(index)">Deletar</a>
                    </form>

                    <span v-if="!token">
                        <a v-if="detalhe && !modal" v-bind:href="detalhe">Detalhe |</a>
                        <modal-link v-if="detalhe && modal" v-bind:item="item" v-bind:url="detalhe" tipo="button" nome="detalhe" titulo="Detalhe" css=""></modal-link>

                        <a v-if="editar && !modal" v-bind:href="editar">Editar |</a>
                        <modal-link v-if="editar && modal" v-bind:item="item" v-bind:url="editar" tipo="button" nome="editar" titulo="Editar" css=""></modal-link>

                        <a v-if="deletar" v-bind:href="deletar">Deletar</a>
                     </span>

                    <span v-if="token && !deletar">
                        <a v-if="detalhe && !modal" v-bind:href="detalhe">Detalhe |</a>
                        <modal-link v-if="detalhe && modal" v-bind:item="item" v-bind:url="detalhe" tipo="button" nome="detalhe" titulo="Detalhe" css=""></modal-link>

                        <a v-if="editar && !modal"  v-bind:href="editar">Editar</a>
                        <modal-link v-if="editar && modal" v-bind:item="item" v-bind:url="editar" tipo="button" nome="editar" titulo="Editar" css=""></modal-link>
                    </span>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        props:['titulos', 'itens', 'ordem', 'ordemcol', 'criar', 'detalhe', 'editar', 'deletar', 'token', 'modal'],
        data: function () {
            return {
                buscar:'',
                ordemAux: this.ordem || "asc",
                ordemAuxCol: this.ordemcol || 0
            }
        },
        methods:{
            executaForm: function (index) {
                document.getElementById(index).submit();
            },
            ordenaColuna: function (coluna) {
                this.ordemAuxCol = coluna;

                if(this.ordemAux.toLowerCase() == "asc"){
                    this.ordemAux = 'desc';
                }else {
                    this.ordemAux = 'asc';
                }
            }
        },
        computed:{
             lista: function () {
                let busca = "php";
                 let ordem =  this.ordemAux;
                 let ordemCol = this.ordemAuxCol;

                 ordem = ordem.toLowerCase();
                 ordemCol = parseInt(ordemCol);

                 if(ordem == "asc"){
                     this.itens.sort(function (a, b) {
                         if (Object.values(a)[ordemCol] > Object.values(b)[ordemCol]) {return 1}
                         if (Object.values(a)[ordemCol] < Object.values(b)[ordemCol]) {return -1}
                         return 0;
                     })
                 }else{

                     this.itens.sort(function (a, b) {
                         if (Object.values(a)[ordemCol] < Object.values(b)[ordemCol]) {return 1}
                         if (Object.values(a)[ordemCol] > Object.values(b)[ordemCol]) {return -1}
                         return 0;
                     })
                 }

                 if(this.buscar){
                     return this.itens.filter(res => {
                         res = Object.values(res);
                         for(let k = 0; k <= res.length; k++){
                             if((res[k] + "").toLowerCase().indexOf(this.buscar.toLowerCase()) >= 0){
                                 return true;
                             }
                         }
                         return false;
                     });
                 }

                return this.itens;
            }
        },
    }
</script>
