<script setup>
defineProps({
    value: String,
});
</script>

<template>
    <label class="block font-bold text-sm text-th-white">
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>
    </label>
</template>
