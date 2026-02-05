

<script setup>
import { computed } from 'vue';
import { Link, usePage } from '@inertiajs/vue3';
const user = computed(() => usePage().props.auth.user); //para obtener el usuario

</script>


<template>
    <header class="mb-5 mt-5">
        <!-- si el usuario esta logueado mostrar su nombre y un boton de logout -->

      <!-- si el usuario esta logueado mostrar su nombre y un boton de logout -->
      <div v-if="user" class="flex items-center gap-4">
        <p class="ml-5 text-xl font-bold">Bienvenido {{ user.name }}</p>
        <Link href="logout" method="post">
          <button class="btn btn-primary">Logout</button>
        </Link>
      </div>
      
      <!-- si el usuario no esta logueado mostrar un boton de login y un boton de register -->
      <div v-else class="flex items-center gap-4">
        <p class="ml-5 text-xl font-bold">Bienvenido</p>
      </div>

    </header>
</template>
<style scoped>

</style>