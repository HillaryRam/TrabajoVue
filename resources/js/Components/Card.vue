<script setup>
const props = defineProps({
    img: String,
    title: String,
    description: String,
    action: String,
    
})
</script>

<template>
    <div class="card bg-base-100 w-96 shadow-sm">
        <figure class="px-10 pt-10">
            <img :src="props.img" alt="icono" class="w-50 h-50 object-contain" />
        </figure>
        <div class="card-body">
            <h2 class="card-title">{{ props.title }}</h2>
            <p>{{ props.description }}</p>
            <div class="card-actions justify-end">
                <button class="btn btn-primary">{{ props.action }}</button>
            </div>
        </div>
    </div>
</template>
    