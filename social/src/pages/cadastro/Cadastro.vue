<template>
  <login-template>
    <span slot="menuesquerdo">
       <img src="https://super.abril.com.br/wp-content/uploads/2019/07/site_poprede.png" class="responsive-img" alt="">
    </span>
    <span slot="principal">
      <h2>Cadastro</h2>
      <input type="text" name="email" placeholder="Nome">
      <input type="email" name="email" placeholder="E-mail">
      <input type="password" name="senha" placeholder="Senha">
      <input type="password" name="senha" placeholder="Confirme sua senha">
      <button class="btn">Enviar</button> 
      <router-link :to="'/login'" class="btn orange">Já tenho conta</router-link>  
    </span>
  </login-template>
</template>

<script>
  import LoginTemplate from '@/templates/LoginTemplate.vue'
  export default {
    name: 'Cadastro',
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
