<script setup>
import Layouts from '@/Layouts/Layouts.vue';
import { ref } from 'vue';
import { computed } from 'vue';
import { router } from '@inertiajs/vue3';

const props = defineProps({
    projects: Object,
    fieldsLabels: Object,
});

const ascendente = ref(false);
const fieldOrder = ref(Object.keys(props.fieldsLabels)[0]);
const projectsOrdered = computed(() =>{
    return [...props.projects].sort((a,b)=>{
        let aVal = a[fieldOrder.value];
        let bVal = b[fieldOrder.value];
        if (aVal < bVal) return ascendente.value ? -1 : 1;
        if (aVal > bVal) return ascendente.value ? 1 : -1;
        return 0;
    });
});

const sort = (field) => { //funcion para ordenar
    if (fieldOrder.value === field) {
        ascendente.value = !ascendente.value;
    } else {
        fieldOrder.value = field;
        ascendente.value = true;
    }
}

const destroy = (id) => { //funcion para eliminar
    if (!confirm('¿Estas seguro de eliminar este proyecto?')) return 0;
    router.delete(route('projects.destroy', id));
}

const edit = (id) => { //funcion para editar
    router.get(route('projects.edit', id));
}



</script>

<template>
    <layouts>
        <div class="overflow-x-auto h-96">
            <table class="table table-zebra">
    <thead>
    <tr>
        <th @click="sort(field)"  v-for="(label, field) in fieldsLabels" :key="field">
            {{ label }}
            <span v-if="fieldOrder.value === field" class="cursor-pointer">{{ ascendente.value ? '↑' : '↓' }}</span>
        </th>
        <th colspan="2"></th>
      </tr>
    </thead>
    <tbody>
      <!-- row 1 -->
      <tr v-for="project in projects" :key="project.id">
        <td v-for="(label, field) in fieldsLabels" :key="field">
            {{ project[field] }}
        </td>
        <td>
            <button @click="edit(project.id)" class="btn btn-primary cursor-pointer">Editar</button>
            <button @click="destroy(project.id)" class="btn btn-error cursor-pointer">Eliminar</button>
        </td>
      </tr>
    </tbody>
  </table>
</div>
</layouts>
</template>
