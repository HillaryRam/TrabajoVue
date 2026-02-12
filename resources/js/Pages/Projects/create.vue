<script setup>
import Layouts from '@/Layouts/Layouts.vue';
import ProjectForm from '@/Components/ProjectForm.vue';

const props = defineProps({
    fieldsLabels: Object,
});
</script>

<template>
    <Layouts>
        <ProjectForm :fieldsLabels="fieldsLabels" />
    </Layouts>
</template>

<style scoped>
</style>