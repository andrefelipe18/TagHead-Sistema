<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <Link :href="'/'">
        <img src="../../img/pnglogo.png" alt="logoTagHead" class="iimg"/>
    </Link>
</template>
<style scoped>
    .iimg {
        width: 100px;
        height: 100px;
        border-radius: 20%;
    }
</style>
