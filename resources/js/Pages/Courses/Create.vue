<script setup>
import Layouts from '@/Layouts/Layouts.vue';
import CourseForm from '@/Components/CourseForm.vue';

const props = defineProps({
    fieldsLabels: Object,
});
</script>

<template>
    <Layouts>
        <CourseForm :fieldsLabels="fieldsLabels" />
    </Layouts>
</template>

<style scoped>
</style>