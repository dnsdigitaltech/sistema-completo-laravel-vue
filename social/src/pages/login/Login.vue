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
        this.$http.post(this.$urlAPI+`login`,{
          email: this.email,
          password: this.password
        })
        .then(response => {
          //console.log(response)
          if(response.data.status){
            //login com sucesso
            console.log('login com sucesso')
            this.$store.commit('setUsuario', response.data.usuario)
            sessionStorage.setItem('usuario',JSON.stringify(response.data.usuario));
            //ao logar vai pra home
            this.$router.push('/')
          }else if(response.data.status == false && response.data.validacao){
            //error de validação
            console.log('error de validação')
            let erros = '';
            for(let erro of Object.values(response.data.erros)){
              erros += erro + " ";
            }
            alert(erros);
          }else{
            //login não existe
            console.log('login não existe')
            alert('Login iválido!');
          }
        })
        .catch(e => {
          alert("Erro! Tente novamente mais tarde!")
        })
      }
    },
  }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
