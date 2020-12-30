<template>
  <site-template>
    <span slot="menuesquerdo">
      <div class="row valign-wrapper">
        <grid-vue tamanho="4">
          <img :src="usuario.imagem" :alt="usuario.name" class="circle responsive-img"> <!-- notice the "circle" class -->
        </grid-vue>
        <grid-vue tamanho="8">
          <h5>{{usuario.name}}</h5>
          <span class="black-text">{{usuario.descricao}}</span>
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
    data () {
      return {
        usuario: false
      }
    },
    created() {
      let usuarioAux = sessionStorage.getItem('usuario');
      if(usuarioAux){
        this.usuario = JSON.parse(usuarioAux)      
      }
    },
    components: {
      SiteTemplate,
      CardConteudoVue,
      CardDetalheVue,
      PublicarConteudoVue,
      GridVue
    }    
  }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
