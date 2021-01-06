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
      <card-conteudo-vue v-for="item in listaConteudos" :key="item.id"
        :id = "item.id" 
        :totalcurtidas = "item.total_curtidas" 
        :comentarios = "item.comentarios" 
        :curtiuconteudo = "item.curtiu_conteudo" 
        :perfil = "item.user.imagem" 
        :nome = "item.user.name" 
        :data = "item.data">      
        <card-detalhe-vue 
          :img = "item.imagem"
          :titulo = "item.titulo"
          :txt = "item.texto"
          :link = "item.link"
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
      let usuarioAux = this.$store.getters.getUsuario
      if(usuarioAux){
        this.usuario = this.$store.getters.getUsuario  
        this.$http.get(this.$urlAPI+`conteudo/lista`,{"headers":{"authorization":"Bearer "+this.$store.getters.getToken}})
        .then(response => {
          console.log(response)
          if(response.data.status){
            this.$store.commit('setConteudosLinhaTempo', response.data.conteudos.data)
          }
        })
        .catch(e => {
          alert("Erro! Tente novamente mais tarde!")
        })
        
        
      }
    },
    components: {
      SiteTemplate,
      CardConteudoVue,
      CardDetalheVue,
      PublicarConteudoVue,
      GridVue
    },
    computed: {
      listaConteudos(){
        return this.$store.getters.getConteudosLinhaTempo;
      }
    }
  }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
