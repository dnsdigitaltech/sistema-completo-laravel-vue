<template>
  <login-template>
    <h2>Login</h2>
    <input type="email" name="email" placeholder="E-mail" id="">
    <input type="password" name="senha" placeholder="Senha" id="">
    <button type="button" class="btn">Entrar</button>
  </login-template>
</template>

<script>
  import LoginTemplate from '@/templates/LoginTemplate.vue'
  import CardConteudoVue from '@/components/social/CardConteudoVue.vue'
  import CardDetalheVue from '@/components/social/CardDetalheVue.vue'
  import PublicarConteudoVue from '@/components/social/PublicarConteudoVue.vue'
  export default {
    name: 'Login',
    components: {
      LoginTemplate,
      CardConteudoVue,
      CardDetalheVue,
      PublicarConteudoVue
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
