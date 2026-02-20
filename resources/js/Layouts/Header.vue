

<script setup>
import { Link } from '@inertiajs/vue3';

</script>


<template>
    <header class="mb-5 mt-5">
        <!-- si el usuario esta logueado mostrar su nombre y un boton de logout -->

      <!-- si el usuario esta logueado mostrar su nombre y un boton de logout -->
      <div v-if="$page.props.auth.user" class="flex items-center gap-4 w-full px-5">
        <p class="text-xl font-bold">Bienvenido {{ $page.props.auth.user.name }}</p>
        
        <div class="flex items-center gap-2 ml-auto">
          <Link :href="route('dashboard')" class="btn btn-ghost btn-sm">
            Volver al Dashboard
          </Link>
          <Link href="logout" method="post">
            <button class="btn btn-primary btn-sm">Logout</button>
          </Link>
        </div>
      </div>
      
      <!-- si el usuario no esta logueado mostrar un boton de login y un boton de register -->
      <div v-else class="flex items-center gap-4 px-5">
        <p class="text-xl font-bold">Bienvenido</p>
      </div>

    </header>
</template>
<style scoped>

</style>