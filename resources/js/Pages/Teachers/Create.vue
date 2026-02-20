<script setup>
import Layouts from '@/Layouts/Layouts.vue';
import TeacherForm from '@/Components/TeacherForm.vue';

const props = defineProps({
    fieldsLabels: Object,
});
</script>

<template>
    <Layouts>
        <TeacherForm :fieldsLabels="fieldsLabels" />
    </Layouts>
</template>

<style scoped>
</style>