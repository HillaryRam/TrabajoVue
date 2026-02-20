<script setup>
import Layouts from '@/Layouts/Layouts.vue';
import StudentForm from '@/Components/StudentForm.vue';

const props = defineProps({
    student: Object,
});
</script>

<template>
    <Layouts>
        <StudentForm :student="student" />
    </Layouts>
</template>

<style scoped>
</style>
