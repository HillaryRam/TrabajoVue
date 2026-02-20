<script setup>
import Layouts from '@/Layouts/Layouts.vue';
import TeacherForm from '@/Components/TeacherForm.vue';

const props = defineProps({
    teacher: Object,
});
</script>

<template>
    <Layouts>
        <TeacherForm :teacher="teacher" />
    </Layouts>
</template>

<style scoped>
</style>