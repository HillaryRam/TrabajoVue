<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import Card from '@/Components/Card.vue';

defineProps({
    cards: Object
});
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200"
            >
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800"
                >
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h1 class="text-2xl font-semibold">Selecciona una opción</h1>
                    </div>
                     <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <Card v-for="card in cards" :key="card.title" 
                    :title="card.title" 
                    :description="card.description"
                    :img="card.img" 
                    :action="card.action"
                    :url="card.url"
                />
            </div>
        </div>
                </div>
            </div>
        </div>
       
    </AuthenticatedLayout>
</template>
