<template>
    <div class="row">
        <div class="card">
            <div class="card-content">
                <div class="row valign-wrapper">
                    <grid-vue tamanho="1">
                    <img :src="perfil" :alt="nome" class="circle responsive-img"> <!-- notice the "circle" class -->
                    </grid-vue>
                    <grid-vue tamanho="11">
                        <span class="black-text">
                            <strong>{{nome}}</strong> - <small>{{data}}</small>
                        </span>                  
                    </grid-vue>
                </div>

                <slot />

            </div>
            <div class="card-action">
                <p>
                    <a style="cursor: pointer;" @click="curtida(id)"><i class="material-icons">{{curtiu}}</i>{{totalCurtidas}}</a>
                    <a style="cursor: pointer;" @click="abreComentarios(id)"><i class="material-icons">insert_comment</i>22</a>
                </p>
                <p v-if="exibirComentario" class="right-align">
                    <input type="text" placeholder="Comentar">
                    <button class="btn waves-effect waves-light orange"><i class="material-icons">send</i></button>
                </p>
                <p v-if="exibirComentario">
                    <ul class="collection">
                        <li class="collection-item avatar">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSIn-gE6j6sjvg0ekFgFBIzVP5VdN3aBu9dLg&usqp=CAU" alt="" class="circle">
                            <span class="title">Davi Bernardo <small> - 13h30 06/01/2020</small></span>
                            <p>Gostei desse comentário </p> 
                        </li>
                        <li class="collection-item avatar">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSIn-gE6j6sjvg0ekFgFBIzVP5VdN3aBu9dLg&usqp=CAU" alt="" class="circle">
                            <span class="title">Davi Bernardo <small> - 13h30 06/01/2020</small></span>
                            <p>Gostei desse comentário </p> 
                        </li>
                        <li class="collection-item avatar">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSIn-gE6j6sjvg0ekFgFBIzVP5VdN3aBu9dLg&usqp=CAU" alt="" class="circle">
                            <span class="title">Davi Bernardo <small> - 13h30 06/01/2020</small></span>
                            <p>Gostei desse comentário </p> 
                        </li>
                    </ul>
                </p>
            </div>
        </div>
    </div>
</template>

<script>
    import GridVue from '@/components/layouts/GridVue.vue'
    export default {
        name: 'CardConteudoVue',
        props: ['id', 'totalcurtidas', 'curtiuconteudo', 'perfil', 'nome',  'data'],        
        data() {
            return {
                curtiu: this.curtiuconteudo ? 'favorite' : 'favorite_border',
                totalCurtidas: this.totalcurtidas,
                exibirComentario: false
            }
        },
        components: {
            GridVue
        },
        methods: {
            curtida(id){
                this.$http.put(this.$urlAPI+`conteudo/curtir/`+id,{},
                {"headers":{"authorization":"Bearer "+this.$store.getters.getToken}})
                .then(response => {
                    if(response.data.status){
                        this.totalCurtidas = response.data.curtidas
                        this.$store.commit('setConteudosLinhaTempo', response.data.lista.conteudos.data)
                        if(this.curtiu == 'favorite_border'){
                            this.curtiu = 'favorite'
                        }else{
                            this.curtiu = 'favorite_border'
                        }

                    }else if(response.data.status == false){
                        //error de validação
                        alert(response.data.error);
                    }
                })
                .catch(e => {
                    alert("Erro! Tente novamente mais tarde!")
                })
                
            },
            abreComentarios(id){
                this.exibirComentario = !this.exibirComentario
            }          
        }
    }
</script>

<style scoped>

</style>