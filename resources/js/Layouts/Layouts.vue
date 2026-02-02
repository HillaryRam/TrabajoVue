<script setup>
import Header from '@/Layouts/Header.vue';
import Footer from '@/Layouts/Footer.vue';
import Nav from '@/Layouts/Nav.vue';
</script>

<template>
    <Nav />
    <Header />
    <slot />
    <Footer />
</template>
<style scoped>

</style>