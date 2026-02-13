<script setup>
import Table from '@/Components/Table.vue';
import projectResource from '@/models/projectResource.js';
import Layouts from '@/Layouts/Layouts.vue';

const props = defineProps({
    rows: Array,
    fields: Object,
});

const model = projectResource;

</script>

<template>
    <Layouts>
        <Table :rows="rows" :fields="fields" :model="model"></Table>
    </Layouts>
</template>

<style scoped>
</style>