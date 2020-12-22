<template>
  <span>

    <div class="row">
      <grid-vue class="input-field" tamanho="12">
        <textarea id="textarea1" class="materialize-textarea"></textarea>
        <label for="textarea1">O que está acontecendo?</label>
      </grid-vue>
      <p>
        <grid-vue class="btn waves-effect waves-light" tamanho="2 offset-s10">Publicar</grid-vue>
      </p>
    </div>
    <card-conteudo-vue 
      perfil = "https://materializecss.com/images/yuna.jpg" 
      nome="Maria Silva" 
      data="22/12/20 15:00">      
      <card-detalhe-vue
        img = "https://materializecss.com/images/sample-1.jpg"
        titulo = "título dinamico"
        txt = "sdv ksbd vksdb vbsd vbs dbv sdv snd vnsd vnsd vn sdnv snd vnsd vnsdvnmsd vn sdonv sdn vosnd vnsd vnsd vsn"
      />
    </card-conteudo-vue>
  </span>
</template>

<script>
  import CardConteudoVue from '@/components/social/CardConteudoVue.vue'
  import CardDetalheVue from '@/components/social/CardDetalheVue.vue'
  import GridVue from '@/components/layouts/GridVue.vue'
  export default {
    name: 'Nome',
    components: {
      CardConteudoVue,
      CardDetalheVue,
      GridVue
    },
    data () {
      return {
        
      }
    }
  }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
