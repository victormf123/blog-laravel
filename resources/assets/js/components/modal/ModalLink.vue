<template>
  <span>
    <span v-if="item">
      <button v-on:click="preencheFormulario()" v-if="!tipo || (tipo != 'button' && tipo != 'link')" type="button" v-bind:class="css || 'btn btn-primary'" data-toggle="modal" v-bind:data-target="'#' + nome">{{titulo}}</button>
      <button v-on:click="preencheFormulario()" v-if="tipo == 'button'" type="button" v-bind:class="css || 'btn btn-primary'" data-toggle="modal" v-bind:data-target="'#' + nome">{{titulo}}</button>
      <a v-on:click="preencheFormulario()" v-if="tipo == 'link'" href="#" v-bind:class="css || ''" data-toggle="modal" v-bind:data-target="'#' + nome">{{titulo}}</a>
    </span>

    <span v-if="!item">
      <button v-if="!tipo || (tipo != 'button' && tipo != 'link')" type="button" v-bind:class="css || 'btn btn-primary'" data-toggle="modal" v-bind:data-target="'#' + nome">{{titulo}}</button>
      <button v-if="tipo == 'button'" type="button" v-bind:class="css || 'btn btn-primary'" data-toggle="modal" v-bind:data-target="'#' + nome">{{titulo}}</button>
      <a v-if="tipo == 'link'" href="#" v-bind:class="css || ''" data-toggle="modal" v-bind:data-target="'#' + nome">{{titulo}}</a>
    </span>

  </span>

</template>

<script>
    export default {
      props:['id', 'tipo','nome','titulo','css','item','url', 'user_id'],
      methods:{
        executaForm: function(index){
            document.getElementById(index).submit();
        },
        preencheFormulario:function(){
            this.$store.commit('setUserId', this.user_id);
            if(this.item.id != undefined){
                axios.get(this.url + this.item.id).then(res => {
                    this.$store.commit('setItem',res.data);
                });
            }else{
                axios.get(this.url + this.id).then(res => {
                    console.log(res.data)
                    this.$store.commit('setItem',res.data);
                });
            }
          //this.$store.commit('setItem',this.item);
        }
      }
    }
</script>
