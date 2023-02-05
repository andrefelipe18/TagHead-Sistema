<script setup>
import Dashboard from "../Dashboard.vue";
import { Head, Link } from "@inertiajs/vue3";
defineProps({ tarefa: Object });
</script>
<script>
export default {
  name: "TarefaIndex",
  components: {
    Dashboard,
    Head,
    Link,
  },
};
</script>
<template>
  <Dashboard>
    <template v-slot:conteudo>
      <div class="h-100 w-100 mx-auto">
        <!-- Exibir dados da tarefa -->
            <section class="max-w-4xl mt-44 p-6 mx-auto bg-th-black-900 rounded-md shadow-md">
                    <h2 class="text-lg font-semibold text-th-white capitalize ">Tarefa ID - {{ tarefa.id }}</h2>
                        <div class="flex flex-col">
                            <div class="mt-5">
                                <label class="text-th-white" for="titulo">Titulo - {{ tarefa.titulo }}</label>
                            </div>

                            <div class="mt-5">
                                <label class="text-th-white" for="descricao">Descricão</label>
                                <textarea disabled id="descricao" :value="tarefa.descricao" name="descricao" type="text" class="block w-full px-4 py-2 mt-2 text-th-white bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-th-red-400 focus:ring-th-red-300 focus:ring-opacity-40 focus:outline-none focus:ring">
                                </textarea>
                            </div>
                            <div class="mt-5">
                                <p class="text-th-white" for="titulo">Data - {{ tarefa.created_at }}</p>
                            </div>
                            <div class="mt-5">
                                <label class="text-th-white" for="titulo">Concluida -
                                    <span v-if="tarefa.concluida == 0">Não</span>
                                    <span v-else>Sim</span>
                                </label>
                            </div>
                        </div>
                        <div class="mt-6">
                            <Link :href="route('tarefa.index')" class="px-8 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Retornar</Link>
                        </div>
                    </section>
        </div>
    </template>
  </Dashboard>
  <Head :title="`Visualizar Tarefa - ID ${tarefa.id}`" />
</template>
<style>
</style>
