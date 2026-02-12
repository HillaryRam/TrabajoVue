<script setup>
import Layouts from '@/Layouts/Layouts.vue';
import ProjectForm from '@/Components/ProjectForm.vue';
const props = defineProps({
    project: Object,
    fieldsLabels: Object,
});

</script>

<template>
    <Layouts>
        <ProjectForm :project="project" :fieldsLabels="fieldsLabels" />
    </Layouts>
</template>

<style scoped>
</style>