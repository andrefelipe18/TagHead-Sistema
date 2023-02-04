<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Aside from '@/Components/Aside.vue';
</script>

<template>
    <!-- Navbar -->
    <AppLayout title="Dashboard">
    <!-- Fim navbar  -->
    <main>
        <div class="flex flex-col md:flex-row">
            <!-- Aside -->
            <Aside />
            <!-- Fim aside -->
            <!-- Conteudo principal -->

            <!-- Fim Conteudo principal -->
        </div>
    </main>
    </AppLayout>
</template>
