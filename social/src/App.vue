<template>
  <span>  
    <header>
      <nav-bar logo="Social" url="#" cor="green darken-1"/>
    </header> 
    <main>
      <div class="container">
        <router-view/>
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

  export default {
    name: 'App',
    components: {
      NavBar,
      FooterVue
    }
  }
</script>

<style>

</style>
