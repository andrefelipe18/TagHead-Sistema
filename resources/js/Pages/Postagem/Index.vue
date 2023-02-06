<script setup>
import Dashboard from "../Dashboard.vue";
import { Head, Link } from "@inertiajs/vue3";
import Post from "./Post.vue";
defineProps({ postagens: Object });
</script>
<script>
export default {
  name: "PostagemIndex",
  components: {
    Dashboard,
    Head,
    Link,
    Post,
  },
};
</script>
<template>
  <Dashboard>
    <template v-slot:conteudo>
        <!-- link para criar novo post -->
        <Link :href="route('postagem.create')" class="fixed w-16 h-16 bg-th-red-500 text-center text-3xl bottom-9 right-9 rounded-3xl shadow-lg z-10">
        <p class="mt-3 text-th-white font-bold">+</p>
        </Link>
        <!-- listagem dos posts -->
        <Post></Post>
    </template>
  </Dashboard>
  <Head title="Postagens" />
</template>
<style>
</style>
