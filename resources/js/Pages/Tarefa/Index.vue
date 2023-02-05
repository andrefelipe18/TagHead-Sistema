<script setup>
import Dashboard from "../Dashboard.vue";
import { Head, Link } from "@inertiajs/vue3";
import Tarefa from "./Tarefa.vue";
defineProps({ tarefas: Object });
</script>
<script>
export default {
  name: "TarefaIndex",
  components: {
    Dashboard,
    Head,
    Link,
    Tarefa,
  },
  data() {
    return {
      //Pegando as tarefas do banco de dados
      tarefasData: this.$page.props.tarefas,
      filtro: "todos",
    };
  },
  computed: {
    tarefasFiltradas(){
        //Filtrando as tarefas com base no select
        if(this.filtro == "concluidas"){
            return this.tarefasData.filter(tarefa => tarefa.concluida == "sim")
        } else if(this.filtro == "aFazer"){
            return this.tarefasData.filter(tarefa => tarefa.concluida == "nao")
        } else {
            return this.tarefasData
        }
    }
  },
};
</script>
<template>
  <Dashboard>
    <template v-slot:conteudo>
      <div class="h-100 w-100 mx-auto">
        <!-- Link criar nova tarefa -->
        <Link :href="route('tarefa.create')" class="fixed w-16 h-16 bg-th-red-500 text-center text-3xl bottom-9 right-9 rounded-3xl shadow-lg z-10">
        <p class="mt-3 text-th-white font-bold">+</p>
        </Link>
        <!-- Listagem de tarefas -->
        <div class="bg-white py-6 sm:py-8 lg:py-12">
          <div class="max-w-screen-2xl px-4 md:px-8 mx-auto">
            <!-- Titulo texto - inicio -->
            <div class="mb-10 md:mb-16">
              <h2 class="
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
                <p class="text-th-black-600 text-center">
                    Total de tarefas: <span class="text-th-red-600">{{ tarefasFiltradas.length }}</span>
                </p>
                <p class="text-th-black-600 text-center">
                    <select id="countries" class="bg-gray-50 border border-th-red-300 text-th-black-900 text-sm rounded-lg focus:ring-th-red-500 focus:border-th-red-500 block w-56 p-2.5" v-model="filtro">
                    <option value="todos" selected class="bg-th-black-900 rounded-sm text-th-white">Todos</option>
                    <option value="concluidas" class="bg-th-black-900 rounded-sm text-th-white">Concluidas</option>
                    <option value="aFazer" class="bg-th-black-900 rounded-sm text-th-white">A Fazer</option>
                    </select>
                </p>
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
              <Tarefa v-for="tarefa in tarefasFiltradas" :key="tarefa.id" :tarefa="tarefa"/>
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
