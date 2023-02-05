<script>
import { Link } from "@inertiajs/vue3";
import CheckboxTarefa from "../../Components/CheckboxTarefa.vue";
export default {
    name: 'Tarefa',
    components: {
        Link,
        CheckboxTarefa,
    },
    props: {
        tarefa: {
            type: Object,
            required: true,
        },
    },
    methods: {
    apagar(id) {
      if (confirm("Deseja realmente excluir?")) {
        this.$inertia.delete(route("tarefa.destroy", id));
      }
    },
  },
}
</script>
<template>
    <!-- Tarefa não concluida -->
    <div class="bg-th-whiteshadow-xl shadow-2xl rounded-md p-4" v-if="tarefa.concluida == 'nao'">
        <div class="flex justify-between items-start gap-2 px-2" >
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
            <p class="text-th-black-800">
                <!-- Formantando o horario -->
                {{ $moment(tarefa.created_at).format('HH:mm') }} -
                {{ $moment(tarefa.created_at).format('DD/MM/YYYY') }}
            </p>
            <div class="flex justify-between items-center">

                <div class="flex">
                    <Link :href="route('tarefa.edit', tarefa.id)" class="text-th-blue-800 mt-2 mr-2">Editar</Link>
                    <button @click="apagar(tarefa.id)" class="text-th-red-800 mt-2" type="button">Excluir</button>
                 </div>
                <!-- input para marcar como concluido -->
                <CheckboxTarefa :id="tarefa.id" :concluidaprop="tarefa.concluida"/>
            </div>
          </div>
        </div>
    </div>
    <!-- Tarefa concluida -->
    <div class="bg-th-black-700 shadow-2xl rounded-md p-4" v-else-if="tarefa.concluida == 'sim'">
        <div class="flex justify-between items-start gap-2 px-2" >
         <div class="flex flex-col">
            <Link
                :href="route('tarefa.show', tarefa.id)"
                class="
                text-th-white
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
            <p class="text-th-black-300">
                <!-- Formantando o horario -->
                {{ $moment(tarefa.created_at).format('HH:mm') }} -
                {{ $moment(tarefa.created_at).format('DD/MM/YYYY') }}
            </p>
            <div class="flex justify-between items-center">

                <div class="flex">
                    <Link :href="route('tarefa.edit', tarefa.id)" class="text-th-blue-500 mt-2 mr-2">Editar</Link>
                    <button @click="apagar(tarefa.id)" class="text-th-red-400 mt-2" type="button">Excluir</button>
                 </div>
                <!-- input para marcar como concluido -->
                <CheckboxTarefa :id="tarefa.id" :concluidaprop="tarefa.concluida"/>
            </div>
          </div>
        </div>
    </div>
</template>
<style>

</style>
