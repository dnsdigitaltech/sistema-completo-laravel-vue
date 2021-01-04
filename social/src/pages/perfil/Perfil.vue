<template>
  <site-template>
    <span slot="menuesquerdo">
       <img :src="usuario.imagem" class="responsive-img" alt="">
    </span>
    <span slot="principal">
      <h2>Perfil</h2>
      <input type="text" placeholder="Nome" v-model="name">
      <input type="email" placeholder="E-mail" v-model="email">
      <textarea placeholder="Descrição" class="materialize-textarea" v-model="descricao"></textarea>
      <div class = "row">
        <div class = "file-field input-field">
          <div class = "btn">
              <span>IMAGEM</span>
              <input type = "file" v-on:change="salvaImagem"/>
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
        descricao:'',
        password:'',
        password_confirmation:'',
        imagem:''
      }
    },
    created() {
      let usuarioAux = sessionStorage.getItem('usuario');
      if(usuarioAux){
        this.usuario = JSON.parse(usuarioAux)        
        this.name = this.usuario.name
        this.email = this.usuario.email
        this.descricao = this.usuario.descricao
      }
    },
    methods: {
      salvaImagem(e){
        let arquivo = e.target.files || e.dataTransfer.files;
        if(!arquivo.length){
          return;
        }
        let reader = new FileReader();
        reader.onloadend = (e) => {
          this.imagem = e.target.result;
        };
        reader.readAsDataURL(arquivo[0]);
      },
      perfil(){
        this.$http.put(this.$urlAPI+`perfil`,{
          name: this.name,
          email: this.email,
          descricao: this.descricao,
          imagem: this.imagem,
          password: this.password,
          password_confirmation: this.password_confirmation,
        },{"headers":{"authorization":"Bearer "+this.usuario.token}})
        .then(response => {
          console.log(this.usuario.status)
          if(response.data.status){
            //login com sucesso
            console.log(response.data.usuario)
            this.usuario = response.data.usuario;
            sessionStorage.setItem('usuario',JSON.stringify(this.usuario));
           alert('Perfil atualizado com sucesso!')
          }else if(response.data.status == false && response.data.validacao){
            //error de validação
            //console.log('error de validação')
            let erros = '';
            for(let erro of Object.values(response.data.erros)){
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
