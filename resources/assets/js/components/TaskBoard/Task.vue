<template>
    <div class="panel panel-default">
        <div class="panel-body">
            <p>{{titulo}}</p>
            <span>
                <modallink v-bind:id="id"  v-bind:item="item" v-bind:url="editar" v-bind:user_id="user_id" tipo="link" nome="editar" titulo=" Editar |" css="" ></modallink>
                <modallink v-bind:id="id"  v-bind:item="item" v-bind:url="deletar" tipo="link" nome="deletar" titulo=" Deletar" css=""></modallink>
            </span>
            <p align="right">By: {{username}}</p>
        </div>
    </div>
</template>

<script>
    export default {
        props:['id','titulo','descricao', 'editar','deletar', 'item', 'user_id', 'username'],
    }
</script>

<style scoped>

</style>