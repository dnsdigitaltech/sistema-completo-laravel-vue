<template>
    <div class="row">
      <grid-vue class="input-field" tamanho="12">
        <input type="text" v-model="conteudo.titulo">
        <textarea v-if="conteudo.titulo" placeholder="Conteúdo" v-model="conteudo.texto" class="materialize-textarea"></textarea>
        <input type="text" v-if="conteudo.titulo && conteudo.texto" placeholder="Link" v-model="conteudo.link">
        <input type="text" v-if="conteudo.titulo && conteudo.texto" placeholder="Url da Imagem" v-model="conteudo.imagem">
        <label>O que está acontecendo?</label>
      </grid-vue>
      <p class="right-align">
        <button @click="addConteudo()" v-if="conteudo.titulo && conteudo.texto" class="btn waves-effect waves-light" tamanho="2 offset-s10">Publicar</button>
      </p>
    </div>
</template>

<script>
    import GridVue from '@/components/layouts/GridVue.vue'
    export default {
        name: 'PublicarConteudoVue',
        props: [],        
        data() {
            return {
                conteudo: {
                  titulo:'',
                  texto:'',
                  link:'',
                  imagem:''
                  }
            }
        },
        components: {
            GridVue
        },
        methods: {
          addConteudo(){
            console.log(this.conteudo)
            this.$http.post(this.$urlAPI+'conteudo/adicionar',{
              titulo: this.conteudo.titulo,
              texto: this.conteudo.texto,
              link: this.conteudo.link,
              imagem: this.conteudo.imagem,
            },
            {"headers":{"authorization":"Bearer "+this.$store.getters.getToken}})
            .then(response => {
              if(response.data.status){
                console.log(response.data.conteudos);
                this.conteudo =  { titulo:'', texto:'', link:'', imagem:'' }
                this.$store.commit('setConteudosLinhaTempo', response.data.conteudos.data)
              }else if(response.data.status == false && response.data.validacao){
                //error de validação
                let erros = '';
                for(let erro of Object.values(response.data.erros)){
                  erros += erro + " ";
                }
                alert(erros);
              }
            })
          }
        },
    }
</script>

<style scoped>

</style>