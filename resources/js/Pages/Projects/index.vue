<script setup>
import Layouts from '@/Layouts/Layouts.vue';
import { Head } from '@inertiajs/vue3';
import Table from '@/Components/Table.vue';
import projectResource from '@/models/projectResource.js';

const props = defineProps({
    rows: Array,
    fields: Object,
});

const model = projectResource;
</script>

<template>
    <Head title="Proyectos" />

    <Layouts>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                Gestión de Proyectos
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <Table :rows="rows" :fields="fields" :model="model" />
                        <div v-if="rows.length === 0" class="text-center py-4 text-gray-500">
                            No hay proyectos registrados.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </Layouts>
</template>

<style scoped>
</style>