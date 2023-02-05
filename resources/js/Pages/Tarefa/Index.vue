<script setup>
import Dashboard from "../Dashboard.vue";
import { Head, Link } from "@inertiajs/vue3";
defineProps({ tarefas: Object });
</script>
<script>
export default {
  name: "TarefaIndex",
  components: {
    Dashboard,
    Head,
    Link,
  },
  data() {
    return {
        test: 'teste'
    }
  },
  methods: {
    apagar(id) {
      if (confirm("Deseja realmente excluir?")) {
        this.$inertia.delete(route("tarefa.destroy", id));
      }
    },
  }
};
</script>
<template>
  <Dashboard>
    <template v-slot:conteudo>
      <div class="h-100 w-100 mx-auto">
        <Link
          :href="route('tarefa.create')"
          class="p-1 text-th-red-800 rounded-lg"
        >
          Criar tarefa</Link
        >
        <!-- Listagem de tarefas -->
        <div class="bg-white py-6 sm:py-8 lg:py-12">
          <div class="max-w-screen-2xl px-4 md:px-8 mx-auto">
            <!-- Titulo texto - inicio -->
            <div class="mb-10 md:mb-16">
              <h2
                class="
                  text-gray-800 text-2xl
                  lg:text-3xl
                  font-bold
                  text-center
                  mb-4
                  md:mb-6
                "
              >
                Lista de tarefas
            </h2>
            </div>
            <!-- Titulo - fim -->
            <div
              class="
                grid
                sm:grid-cols-2
                lg:grid-cols-3
                xl:grid-cols-4
                gap-x-4
                md:gap-x-6
                gap-y-8
              "
            >
              <!-- tarefa - inicio -->
              <div class="bg-th-white shadow-xl rounded-md p-4"
               v-for="tarefa in tarefas" :key="tarefa.id">
                <div class="flex justify-between items-start gap-2 px-2">
                  <div class="flex flex-col">
                    <Link
                     :href="route('tarefa.show', tarefa.id)"
                      class="
                       text-th-black-800
                        hover:text-red-500
                        text-lg
                        lg:text-xl
                        font-bold
                        transition
                        duration-100
                      "
                      >
                      {{ tarefa.titulo }}
                      </Link>
                    <p class="text-th-black-800">{{ tarefa.created_at }}</p>
                    <div class="flex ">
                    <Link :href="route('tarefa.edit', tarefa.id)" class="text-th-blue-800 mt-2 mr-2">Editar {{ tarefa.id }}</Link>
                    <button @click="apagar(tarefa.id)" class="text-th-red-800 mt-2" type="button">Excluir</button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- tarefa - fim -->
            </div>
          </div>
        </div>
      </div>
    </template>
  </Dashboard>
  <Head title="Tarefas" />
</template>
<style>
</style>
