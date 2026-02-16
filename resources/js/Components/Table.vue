<script setup>

import { ref } from 'vue';
import { computed } from 'vue';
import { router } from '@inertiajs/vue3';

const props = defineProps({
    fields: Object,
    rows: Array,
    model: Object,
    
});

const ascendente = ref(false);
const fieldOrder = ref(Object.keys(props.fields)[0]);

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
    router.delete(route(props.model.routes.delete, id));
}

const edit = (id) => { //funcion para editar
    router.get(route(props.model.routes.edit, id));
}

const add = () => { //funcion para añadir
    router.get(route(props.model.routes.create));
}

</script>

<template>
        <div class="overflow-x-auto h-96">
            <h1><button class="btn btn-primary" @click="add">Añadir {{props.model.name}}</button></h1>
            <table class="table table-zebra">
    <thead>
    <tr>
        <th @click="sort(field)"  v-for="(label, field) in fields" :key="field">
            {{ label }}
            <span v-if="fieldOrder === field" class="cursor-pointer">{{ ascendente ? '↑' : '↓' }}</span>
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
            <button @click="edit(row.id)" class="btn btn-primary cursor-pointer">Editar</button>
        </td>
        <td>
            <button @click="destroy(row.id)" class="btn btn-error cursor-pointer">Eliminar</button>
        </td>
      </tr>
    </tbody>
  </table>
</div>
</template>
