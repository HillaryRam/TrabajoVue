<script setup>

import {useForm} from '@inertiajs/vue3';
const props = defineProps({
    project: Object,
    fieldsLabels: Object,
});

const form = useForm({
    name: props.project?.name ?? "",
    description: props.project?.description ?? "",
    hours: props.project?.hours ?? "",
    starting_date: props.project?.starting_date ?? 0,
});

const submit = () => {
    if (props.project) {
        form.put(route('projects.update', props.project.id));
    } else {
        form.post(route('projects.store'));
    }
}
</script>

<template>
    <div class="flex justify-center mt-10">
      <div class="card w-full max-w-2xl bg-base-100 shadow-xl">
        <div class="card-body">
          <h2 class="card-title text-2xl font-bold">
            {{ form.id ? "Editar Proyecto" : "Nuevo Proyecto" }}
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
                  placeholder="Introduce el nombre del proyecto"
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
                  placeholder="Describe el proyecto"
                  v-model="form.description"
              ></textarea>
              <label v-if="form.errors.description" class="label">
                <span class="label-text-alt text-error">{{ form.errors.description }}</span>
              </label>
            </div>

            <!-- Horas -->
            <div class="form-control">
              <label class="label">
                <span class="label-text font-semibold">Horas</span>
              </label>
              <input
                  type="number"
                  min="0"
                  class="input input-bordered w-full"
                  v-model="form.hours"
              />
              <label v-if="form.errors.hours" class="label">
                <span class="label-text-alt text-error">{{ form.errors.hours }}</span>
              </label>
            </div>

            <!-- Fecha de comienzo -->
            <div class="form-control">
              <label class="label">
                <span class="label-text font-semibold">Fecha de comienzo</span>
              </label>
              <input
                  type="date"
                  class="input input-bordered w-full"
                  v-model="form.starting_date"
              />
              <label v-if="form.errors.starting_date" class="label">
                <span class="label-text-alt text-error">{{ form.errors.starting_date }}</span>
              </label>
            </div>

            <!-- Botones -->
            <div class="card-actions justify-end mt-6">
              <button
                  type="button"
                  class="btn btn-ghost"
                  @click="$inertia.visit(route('projects.index'))"
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