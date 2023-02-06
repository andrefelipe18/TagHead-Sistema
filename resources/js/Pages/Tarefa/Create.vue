<script setup>
import Dashboard from '../Dashboard.vue';
import { Head, Link, useForm } from '@inertiajs/vue3'
defineProps({ errors: Object });
</script>
<script>
export default {
    name: 'TarefaIndex',
    components: {
        Dashboard,
        Head,
        Link
    },
    data() {
        const form = useForm({
            titulo: '',
            descricao: '',
        })
        return {
            form
        }
    }
}
</script>
<template>
    <Dashboard>
        <template v-slot:conteudo>
            <div class="h-100 w-100 mx-auto flex flex-col">
                <!-- Link para voltar -->
                <Link :href="route('tarefa.index')" class="fixed w-16 h-16 bg-th-red-500 text-center text-3xl bottom-9 right-9 rounded-3xl shadow-lg z-10">
                <p class="mt-3 text-th-white font-bold">←</p>
                </Link>
                <!-- Formulario de criação -->
                <div class="mt-32">
                    <section class="max-w-4xl p-6 mx-auto bg-th-black-900 rounded-md shadow-md">
                    <h2 class="text-lg font-semibold text-th-white capitalize ">Criar nova tarefa</h2>
                    <form @submit.prevent="form.post(route('tarefa.store'))">
                        <div class="flex flex-col">
                            <div class="mt-5">
                                <label class="text-th-white" for="titulo">Titulo</label>
                                <input v-model="form.titulo" id="titulo" name="titulo" type="text" class="block w-full px-4 py-2 mt-2 text-th-white bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-th-red-400 focus:ring-th-red-300 focus:ring-opacity-40 focus:outline-none focus:ring">
                                <p v-if="errors.titulo">{{ errors.titulo }}</p>
                            </div>

                            <div class="mt-5">
                                <label class="text-th-white" for="descricao">Descricão</label>
                                <textarea v-model="form.descricao" id="descricao" name="descricao" type="text" class="block w-full px-4 py-2 mt-2 text-th-white bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-th-red-400 focus:ring-th-red-300 focus:ring-opacity-40 focus:outline-none focus:ring">
                                </textarea>
                                <p v-if="errors.descricao">{{ errors.descricao }}</p>
                            </div>
                        </div>

                        <div class="mt-6">
                            <button class="px-8 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Salvar</button>
                        </div>
                    </form>
                    </section>
                </div>
            </div>
        </template>
    </Dashboard>
    <Head title="Criar Tarefa" />
</template>
<style>

</style>
