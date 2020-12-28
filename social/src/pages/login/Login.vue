<template>
  <login-template>
    <span slot="menuesquerdo">
       <img src="https://super.abril.com.br/wp-content/uploads/2019/07/site_poprede.png" class="responsive-img" alt="">
    </span>
    <span slot="principal">
        <h2>Login</h2>
        <input type="email" name="email" placeholder="E-mail" v-model="email">
        <input type="password" name="senha" placeholder="Senha" v-model="password">
        <button class="btn" v-on:click="login">Entrar</button>
        <router-link :to="'/cadastro'" class="btn orange">Cadastre-se</router-link> 
    </span>
  </login-template>
</template>

<script>
  import LoginTemplate from '@/templates/LoginTemplate.vue'
  import axios from 'axios'
  export default {
    name: 'Login',
    components: {
      LoginTemplate
    },
    data () {
      return {        
        email:'', 
        password:''
      }         
    },
    methods: {
      login(){
        console.log('ok')
        axios.post(`http://127.0.0.1:8000/api/login`,{
          email: this.email,
          password: this.password
        })
        .then(response => {
          console.log(response)
        })
        .catch(e => {
          console.log(e)
          this.errors.push(e)
        })
      }
    },
  }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
