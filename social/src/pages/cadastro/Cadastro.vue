<template>
  <login-template>
    <span slot="menuesquerdo">
       <img src="https://super.abril.com.br/wp-content/uploads/2019/07/site_poprede.png" class="responsive-img" alt="">
    </span>
    <span slot="principal">
      <h2>Cadastro</h2>
      <input type="text" placeholder="Nome" v-model="name">
      <input type="email" placeholder="E-mail" v-model="email">
      <input type="password" placeholder="Senha" v-model="password">
      <input type="password" placeholder="Confirme sua senha" v-model="password_confirmation">
      <button class="btn" v-on:click="cadastro()">Enviar</button> 
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
        name:'',
        email:'', 
        password:'',
        password_confirmation:''
      }
    },
    methods: {
      cadastro(){
        console.log('ok')
        this.$http.post(this.$urlAPI+`cadastro`,{
          name: this.name,
          email: this.email,
          password: this.password,
          password_confirmation: this.password_confirmation,
        })
        .then(response => {
          console.log(response)
          if(response.data.status){
            //login com sucesso
            console.log('Cadastro realizado com sucesso')
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
            alert('Erro no cadastro! Tente novamente mais tarde!');
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
