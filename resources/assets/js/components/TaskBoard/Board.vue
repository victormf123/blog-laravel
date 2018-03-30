<template>
    <div class="col-sm-6 col-md-4">
        <div v-bind:class="defineCor">
            <div v-if="titulo" class="panel-heading">{{titulo}}</div>

            <div class="panel-body">
                <slot></slot>
            </div>
        </div>



    </div>
</template>

<script>
    export default {
        props:['titulo','cor', 'id'],
        computed:{
            defineCor: function(){
                return "panel "+ (this.cor || "panel-default");
            }
        }
    }
</script>

<style scoped>

</style>