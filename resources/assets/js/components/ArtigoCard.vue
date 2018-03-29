<template>
    <div :class="'col-sm-'+  sm || '6' + ' col-md-'+ md || 4 ">
        <div class="thumbnail">
            <img src="https://www.oversodoinverso.com.br/wp-content/uploads/2013/10/filhotes-1.jpg" alt="...">
            <div class="caption">
                <small>{{data | formataData}} - {{autor}}</small>
                <h3>{{titulo}}</h3>
                <p>{{descricao}}</p>
                <p><a :href="link" class="btn btn-primary" role="button">Leia mais</a></p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['titulo', 'descricao', 'imagem', 'link', 'data', 'autor', 'sm', 'md'],
        filters: {
            formataData: function (value) {
                if (!value) return '';
                value = value.toString();
                if (value.split('-').length == 3) {
                    value = value.split('-')
                    return value[2] + '/' + value[1] + '/' + value[0];
                }
                return value;
            }
        }
    }
</script>

<style scoped>

</style>