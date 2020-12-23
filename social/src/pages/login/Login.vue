<template>
  <login-template>
    <span slot="menuesquerdo">
       <img src="https://super.abril.com.br/wp-content/uploads/2019/07/site_poprede.png" class="responsive-img" alt="">
    </span>
    <span slot="principal">
      <span v-if="!cadastro">
        <h2>Login</h2>
        <input type="email" name="email" placeholder="E-mail">
        <input type="password" name="senha" placeholder="Senha">
        <button class="btn">Entrar</button>
        <button class="btn orange" @click="cadastro = !cadastro">Cadastre-se</button>
      </span>
      <span v-if="cadastro">
        <h2>Cadastro</h2>
        <input type="text" name="email" placeholder="Nome">
        <input type="email" name="email" placeholder="E-mail">
        <input type="password" name="senha" placeholder="Senha">
        <input type="password" name="senha" placeholder="Confirme sua senha">
        <button class="btn">Enviar</button>
        <button class="btn orange" @click="cadastro = !cadastro">Já tenho conta</button>
      </span>      
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
        cadastro:false
      }
    }
  }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
