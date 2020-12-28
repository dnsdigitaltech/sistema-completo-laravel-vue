<template>
  <span>  
    <header>
      <nav-bar logo="Social" url="/" cor="green darken-1">
        <li><router-link to="/">Home</router-link></li>
        <li v-if="!usuario"><router-link to="/login">Entrar</router-link></li>
        <li v-if="!usuario"><router-link to="/cadastro">Cadastre-se</router-link></li>
        <li v-if="usuario"><router-link to="/perfil">{{usuario.name}}</router-link></li>
        <li v-if="usuario"><a v-on:click="sair()">sair</a></li>
      </nav-bar>
    </header> 
    <main>
      <div class="container">
        <div class="row">
          <grid-vue tamanho="4">
            <card-menu-vue>
              <slot name="menuesquerdo" />
            </card-menu-vue>
            <card-menu-vue>
              <h3>Teste</h3>
            </card-menu-vue>
          </grid-vue>
          <grid-vue tamanho="8">
              <!--content page-->
            <slot name="principal"/>
          </grid-vue>
        </div>  
      </div>      
    </main>
    <footer-vue cor="green darken-1" logo="Social" descricao="Teste de descrição">
      <li><a class="grey-text text-lighten-3" href="#!">Link 1 slote</a></li>
      <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
      <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
      <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
    </footer-vue>
  </span>
</template>

<script>

 
  import NavBar from '@/components/layouts/NavBar.vue'
  import FooterVue from '@/components/layouts/FooterVue.vue'
  import GridVue from '@/components/layouts/GridVue.vue'
  import CardMenuVue from '@/components/layouts/CardMenuVue.vue'


  export default {
    name: 'SiteTemplate',
    data(){
      return {
        usuario: false
      }
    },
    components: {
      NavBar,
      FooterVue,
      GridVue,
      CardMenuVue
    },
    created() {
      console.log('created');
      let usuarioAux = sessionStorage.getItem('usuario');
      if(usuarioAux){
        this.usuario = JSON.parse(usuarioAux)        
      }
    },
    methods: {
      sair(){
        sessionStorage.clear();
        this.usuario = false
      }
    },
  }
</script>

<style>

</style>
