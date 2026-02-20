<script setup>

import {useForm} from '@inertiajs/vue3';
const props = defineProps({
    course: Object,
    fieldsLabels: Object,
});

const form = useForm({
    name: props.course?.name ?? "",
    description: props.course?.description ?? "",
});

const submit = () => {
    if (props.course) {
        form.put(route('courses.update', props.course.id));
    } else {
        form.post(route('courses.store'));
    }
}
</script>

<template>
    <div class="flex justify-center mt-10">
      <div class="card w-full max-w-2xl bg-base-100 shadow-xl">
        <div class="card-body">
          <h2 class="card-title text-2xl font-bold">
            {{ form.id ? "Editar Curso" : "Nuevo Curso" }}
          </h2>

          <form @submit.prevent="submit" class="space-y-4">

            <!-- Nombre -->
            <div class="form-control">
              <label class="label">
                <span class="label-text font-semibold">Nombre</span>
              </label>
              <input
                  type="text"
                  class="input input-bordered w-full"
                  placeholder="Introduce el nombre del curso"
                  v-model="form.name"
                  required
              />
              <label v-if="form.errors.name" class="label">
                <span class="label-text-alt text-error">{{ form.errors.name }}</span>
              </label>
            </div>

            <!-- Descripción -->
            <div class="form-control">
              <label class="label">
                <span class="label-text font-semibold">Descripción</span>
              </label>
              <textarea
                  class="textarea textarea-bordered w-full"
                  rows="4"
                  placeholder="Describe el curso"
                  v-model="form.description"
              ></textarea>
              <label v-if="form.errors.description" class="label">
                <span class="label-text-alt text-error">{{ form.errors.description }}</span>
              </label>
            </div>

            <!-- Botones -->
            <div class="card-actions justify-end mt-6">
              <button
                  type="button"
                  class="btn btn-ghost"
                  @click="$inertia.visit(route('courses.index'))"
              >
                Cancelar
              </button>

              <button
                  type="submit"
                  class="btn btn-primary"
                  :class="{ 'btn-disabled loading': form.processing }"
              >
                Guardar
              </button>
            </div>

          </form>
        </div>
      </div>
    </div>

</template>

<style scoped>

</style>