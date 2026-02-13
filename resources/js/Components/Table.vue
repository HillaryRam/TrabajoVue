<template>
    <Table :rows="projects" :labels="labels" :resource="Projects"></Table>
</template>

<script setup>
import Layouts from '@/Layouts/Layouts.vue';
import { ref } from 'vue';
import { computed } from 'vue';
import { router } from '@inertiajs/vue3';

const props = defineProps({
    fiels: Object,
    rows: Array,
    model: Object,
    
});

const ascendente = ref(false);
const fieldOrder = ref(Object.keys(props.fieldsLabels)[0]);

const rowsOrdered = computed(() =>{
    return [...props.rows].sort((a,b)=>{
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
    router.delete(props.model.routes.delete(id)); //llama a la funcion delete del modelo del archivo projectResource.js
}

const edit = (id) => { //funcion para editar
    router.get(props.model.routes.edit(id)); //llama a la funcion edit del modelo del archivo projectResource.js
}

const add = () => { //funcion para añadir
    router.get(props.model.routes.create()); //llama a la funcion create del modelo del archivo projectResource.js
}



</script>

<template>
    <layouts>
        <div class="overflow-x-auto h-96">
            <h1><button class="btn btn-primary" @click="add">Añadir {{props.model.name}}</button></h1>
            <table class="table table-zebra">
    <thead>
    <tr>
        <th @click="sort(field)"  v-for="(label, field) in fields" :key="field">
            {{ label }}
            <span v-if="fieldOrder.value === field" class="cursor-pointer">{{ ascendente.value ? '↑' : '↓' }}</span>
        </th>
        <th colspan="2"></th>
      </tr>
    </thead>
    <tbody>
      <!-- row 1 -->
      <tr v-for="row in rowsOrdered" :key="row.id">
        <td v-for="(value, key) in fields">
            {{ row[key] }}
        </td>
        <td>
            <button @click="router.get(props.model.routes.edit(row.id))" class="btn btn-primary cursor-pointer">Editar</button>
        </td>
        <td>
            <button @click="router.delete(props.model.routes.delete(row.id))" class="btn btn-error cursor-pointer">Eliminar</button>
        </td>
      </tr>
    </tbody>
  </table>
</div>
</layouts>
</template>
