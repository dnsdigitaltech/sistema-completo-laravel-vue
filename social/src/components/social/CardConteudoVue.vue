<template>
    <div class="card">
        <div class="card-content">
            <div class="row valign-wrapper">
                <grid-vue tamanho="4">
                  <img src="https://materializecss.com/images/yuna.jpg" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
                </grid-vue>
                <grid-vue tamanho="8">
                    <span class="black-text">
                        <strong>Maria</strong> - <small>14/10/20 14:55</small>
                    </span>                  
                </grid-vue>
            </div>

            <div class="card-image">
                <img src="https://materializecss.com/images/sample-1.jpg">
                <span class="card-title">Card Title</span>
            </div>
            <div class="card-content">
                <p>I am a very simple card. I am good at containing small bits of information.
                I am convenient because I require little markup to use effectively.</p>
            </div>

        </div>
        <div class="card-action">
            <p>
                <i class="material-icons">favorite_border</i>
                <i class="material-icons">insert_comment</i>
            </p>
        </div>
    </div>
</template>

<script>
    import GridVue from '@/components/layouts/GridVue.vue'
    export default {
        name: 'CardConteudoVue',
        props: [],        
        data() {
            return {
                
            }
        },
        components: {
            GridVue
        }
    }
</script>

<style scoped>

</style>