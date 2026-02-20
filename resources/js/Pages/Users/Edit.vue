<script setup>
import Layouts from '@/Layouts/Layouts.vue';
import UserForm from '@/Components/UserForm.vue';
const props = defineProps({
    user: Object,
    fieldsLabels: Object,
});

</script>

<template>
    <Layouts>
        <UserForm :user="user" :fieldsLabels="fieldsLabels" />
    </Layouts>
</template>

<style scoped>
</style>