<template>
  <div>
      <card-conteudo-vue 
      perfil = "https://materializecss.com/images/yuna.jpg" 
      nome="Maria Silva" 
      data="22/12/20 15:00">
      
      <card-detalhe-vue
      img = "https://materializecss.com/images/sample-1.jpg"
      titulo = "título dinamico"
      txt = "sdv ksbd vksdb vbsd vbs dbv sdv snd vnsd vnsd vn sdnv snd vnsd vnsdvnmsd vn sdonv sdn vosnd vnsd vnsd vsn"
      ></card-detalhe-vue>

      </card-conteudo-vue>

      
  </div>
</template>

<script>
  import CardConteudoVue from '@/components/social/CardConteudoVue.vue'
  import CardDetalheVue from '@/components/social/CardDetalheVue.vue'
  export default {
    name: 'Nome',
    components: {
      CardConteudoVue,
      CardDetalheVue
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
