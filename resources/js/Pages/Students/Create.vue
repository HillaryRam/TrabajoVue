<script setup>
import Layouts from '@/Layouts/Layouts.vue';
import StudentForm from '@/Components/StudentForm.vue';

const props = defineProps({
    fieldsLabels: Object,
});
</script>

<template>
    <Layouts>
        <StudentForm />
    </Layouts>
</template>

<style scoped>
</style>