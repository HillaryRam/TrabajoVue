<script setup>
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    user: Object,
});

const form = useForm({
    name: props.user?.name ?? "",
    email: props.user?.email ?? "",
    password: "",
    password_confirmation: "",
});

const submit = () => {
    if (props.user) {
        form.put(route('users.update', props.user.id));
    } else {
        form.post(route('users.store'), {
            onFinish: () => form.reset('password', 'password_confirmation'),
        });
    }
}
</script>

<template>
    <div class="flex justify-center mt-10">
      <div class="card w-full max-w-2xl bg-base-100 shadow-xl">
        <div class="card-body">
          <h2 class="card-title text-2xl font-bold">
            {{ props.user ? "Editar Usuario" : "Nuevo Usuario" }}
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
                  placeholder="Introduce el nombre completo"
                  v-model="form.name"
                  required
              />
              <label v-if="form.errors.name" class="label">
                <span class="label-text-alt text-error">{{ form.errors.name }}</span>
              </label>
            </div>

            <!-- Email -->
            <div class="form-control">
              <label class="label">
                <span class="label-text font-semibold">Email</span>
              </label>
              <input
                  type="email"
                  class="input input-bordered w-full"
                  placeholder="ejemplo@correo.com"
                  v-model="form.email"
                  required
              />
              <label v-if="form.errors.email" class="label">
                <span class="label-text-alt text-error">{{ form.errors.email }}</span>
              </label>
            </div>

            <!-- Password (Solo si es nuevo) -->
            <template v-if="!props.user">
                <div class="form-control">
                <label class="label">
                    <span class="label-text font-semibold">Contraseña</span>
                </label>
                <input
                    type="password"
                    class="input input-bordered w-full"
                    placeholder="Contraseña segura"
                    v-model="form.password"
                    required
                />
                <label v-if="form.errors.password" class="label">
                    <span class="label-text-alt text-error">{{ form.errors.password }}</span>
                </label>
                </div>

                <div class="form-control">
                <label class="label">
                    <span class="label-text font-semibold">Confirmar Contraseña</span>
                </label>
                <input
                    type="password"
                    class="input input-bordered w-full"
                    placeholder="Repite la contraseña"
                    v-model="form.password_confirmation"
                    required
                />
                </div>
            </template>

            <!-- Botones -->
            <div class="card-actions justify-end mt-6">
              <button
                  type="button"
                  class="btn btn-ghost"
                  @click="$inertia.visit(route('users.index'))"
              >
                Cancelar
              </button>

              <button
                  type="submit"
                  class="btn btn-primary"
                  :class="{ 'btn-disabled loading': form.processing }"
              >
                {{ props.user ? "Actualizar" : "Crear Usuario" }}
              </button>
            </div>

          </form>
        </div>
      </div>
    </div>
</template>

<style scoped>
</style>