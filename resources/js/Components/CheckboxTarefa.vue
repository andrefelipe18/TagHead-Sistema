<script>
export default {
    name: "CheckboxTarefa",
    props: {
        id: {
            type: Number,
            required: true,
        },
        concluidaprop: {
            type: String,
            required: true,
        },
    },
    data() {
        return {
            checado: false,
        }
    },
    computed: {
        concluida() {
            if(this.concluidaprop == 'sim') {
                this.checado = true;
            } else {
                this.checado = false;
            }
        }
    },
    methods: {
        toggleCheckbox() {
            this.checado = !this.checado;

            //Enviando para o backend com o inertia
            if(this.checado) {
                let concluida = 'sim';
                let id = this.id;
                this.$inertia.put(route('tarefa.concluir', { id: id, concluida: concluida }));
            } else {
                let concluida = 'nao';
                let id = this.id;
                this.$inertia.put(route('tarefa.concluir', { id: id, concluida: concluida }));
            }
        },
    }
}
</script>
<template>
    <input
        v-model="checado"
        @click="toggleCheckbox"
        :value="concluida"
        type="checkbox"
        class="rounded border-th-red-900 mt-2 text-th-red-600 shadow-sm focus:border-th-red-500 focus:ring focus:ring-th-red-700 focus:ring-opacity-50"
    >
</template>
