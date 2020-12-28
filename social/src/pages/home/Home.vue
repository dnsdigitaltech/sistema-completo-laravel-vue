<template>
  <site-template>
    <span slot="menuesquerdo">
      <div class="row valign-wrapper">
        <grid-vue tamanho="4">
          <img src="https://materializecss.com/images/yuna.jpg" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
        </grid-vue>
        <grid-vue tamanho="8">
          <h5>Maria</h5>
          <span class="black-text">Add the "circle" class to it to make it appear circular.</span>
        </grid-vue>
      </div>
    </span>
    <span slot="principal">
      <publicar-conteudo-vue />
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
    
  </site-template>
</template>

<script>
  import SiteTemplate from '@/templates/SiteTemplate.vue'
  import CardConteudoVue from '@/components/social/CardConteudoVue.vue'
  import CardDetalheVue from '@/components/social/CardDetalheVue.vue'
  import PublicarConteudoVue from '@/components/social/PublicarConteudoVue.vue'
  import GridVue from '@/components/layouts/GridVue.vue'
  export default {
    name: 'Home',
    components: {
      SiteTemplate,
      CardConteudoVue,
      CardDetalheVue,
      PublicarConteudoVue,
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
