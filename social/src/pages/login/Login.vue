<template>
  <login-template>
    <span slot="menuesquerdo">
       <img src="https://super.abril.com.br/wp-content/uploads/2019/07/site_poprede.png" class="responsive-img" alt="">
    </span>
    <span slot="principal">
      <h2>Login</h2>
      <input type="email" name="email" placeholder="E-mail" id="">
      <input type="password" name="senha" placeholder="Senha" id="">
      <button type="button" class="btn">Entrar</button>
    </span>
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
