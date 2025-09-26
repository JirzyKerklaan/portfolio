<script setup>
defineProps({
    url: String,
    alt: String,
});
</script>

<template>
    <img :src="url" :alt="alt ?? 'image'" draggable="false"/>
</template>