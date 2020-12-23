<template>
    <div>
        <nav :class="cor || 'blue'">
            <div class="nav-wrapper container">
                <a :href="url || '#/'" class="brand-logo">{{logo || 'Social'}}</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <slot/>
                </ul>
            </div>
        </nav>
    </div>
</template>

<script>
export default {
    name: 'NavBar',
    props: ['logo', 'url', 'cor'],
    data() {
        return {
            
        }
    },
}
</script>

<style scoped>
    
</style>