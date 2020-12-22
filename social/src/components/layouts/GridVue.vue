<template>
    <div>
        <div :class="'col s'+ tamanho">
            <slot></slot>
        </div>
    </div>
</template>

<script>

export default {
    name: 'Gridvue',
    props: ['tamanho'],
    data() {
        return {
            
        }
    },
}
</script>

<style scoped>

</style>