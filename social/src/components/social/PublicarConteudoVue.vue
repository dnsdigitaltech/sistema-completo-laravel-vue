<template>
    <div class="row">
      <grid-vue class="input-field" tamanho="12">
        <input type="text" v-model="conteudo.titulo">
        <textarea v-if="conteudo.titulo" placeholder="Conteúdo" v-model="conteudo.texto" class="materialize-textarea"></textarea>
        <input type="text" v-if="conteudo.titulo && conteudo.texto" placeholder="Link" v-model="conteudo.link">
        <input type="text" v-if="conteudo.titulo && conteudo.texto" placeholder="Url da Imagem" v-model="conteudo.imagem">
        <label>O que está acontecendo?</label>
      </grid-vue>
      <p>
        <grid-vue v-if="conteudo.titulo && conteudo.texto" class="btn waves-effect waves-light" tamanho="2 offset-s10">Publicar</grid-vue>
      </p>
    </div>
</template>

<script>
    import GridVue from '@/components/layouts/GridVue.vue'
    export default {
        name: 'PublicarConteudoVue',
        props: [''],        
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
        }
    }
</script>

<style scoped>

</style>