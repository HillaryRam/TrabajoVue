<script setup>
import Layouts from '@/Layouts/Layouts.vue';
import CourseForm from '@/Components/CourseForm.vue';
const props = defineProps({
    course: Object,
    fieldsLabels: Object,
});

</script>

<template>
    <Layouts>
        <CourseForm :course="course" :fieldsLabels="fieldsLabels" />
    </Layouts>
</template>

<style scoped>
</style>