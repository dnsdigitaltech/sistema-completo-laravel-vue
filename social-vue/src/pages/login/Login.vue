<template>
  <login-template>
    <span slot="menuesquerdo">
       <img src="https://super.abril.com.br/wp-content/uploads/2019/07/site_poprede.png" class="responsive-img" alt="">
    </span>
    <span slot="principal">
        <h2>Login</h2>
        <input type="email" name="email" placeholder="E-mail">
        <input type="password" name="senha" placeholder="Senha">
        <button class="btn">Entrar</button>
        <router-link :to="'/cadastro'" class="btn orange">Cadastre-se</router-link> 
    </span>
  </login-template>
</template>

<script>
  import LoginTemplate from '@/templates/LoginTemplate.vue'
  export default {
    name: 'Login',
    components: {
      LoginTemplate
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
