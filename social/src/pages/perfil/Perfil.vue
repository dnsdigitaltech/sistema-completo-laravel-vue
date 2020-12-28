<template>
  <site-template>
    <span slot="menuesquerdo">
       <img src="https://super.abril.com.br/wp-content/uploads/2019/07/site_poprede.png" class="responsive-img" alt="">
    </span>
    <span slot="principal">
      <h2>Perfil</h2>
      <input type="text" placeholder="Nome" v-model="name">
      <input type="email" placeholder="E-mail" v-model="email">
    
      <div class = "row">
        <div class = "file-field input-field">
          <div class = "btn">
              <span>IMAGEM</span>
              <input type = "file" />
          </div>
          
          <div class = "file-path-wrapper">
              <input class = "file-path validate" type = "text"
                placeholder = "Adicionar foto" />
          </div>
        </div>
      </div>

      <input type="password" placeholder="Senha" v-model="password">
      <input type="password" placeholder="Confirme sua senha" v-model="password_confirmation">
      <button class="btn" v-on:click="perfil()">Atualizar</button>  
    </span>
  </site-template>
</template>

<script>
  import SiteTemplate from '@/templates/SiteTemplate.vue'
  import axios from 'axios'
  export default {
    name: 'Perfil',
    components: {
      SiteTemplate
    },
    data () {
      return {
        usuario:false,
        name:'',
        email:'', 
        password:'',
        password_confirmation:''
      }
    },
    created() {
      let usuarioAux = sessionStorage.getItem('usuario');
      if(usuarioAux){
        this.usuario = JSON.parse(usuarioAux)        
        this.name = this.usuario.name
        this.email = this.usuario.email
      }
    },
    methods: {
      perfil(){
        axios.put(`http://127.0.0.1:8000/api/perfil`,{
          name: this.name,
          email: this.email,
          password: this.password,
          password_confirmation: this.password_confirmation,
        },{"headers":{"authorization":"Bearer "+this.usuario.token}})
        .then(response => {
          console.log(this.usuario.token)
          if(response.data.token){
            //login com sucesso
            console.log(response.data)
           sessionStorage.setItem('usuario',JSON.stringify(response.data));
           alert('Perfil atualizado com sucesso!')
          }else{
            //error de validação
            console.log('error de validação')
            let erros = '';
            for(let erro of Object.values(response.data)){
              erros += erro + " ";
            }
            alert(erros);
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
