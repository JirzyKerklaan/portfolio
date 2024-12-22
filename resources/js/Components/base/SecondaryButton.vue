<script setup>
defineProps({
    text: String,
    url: String,
});
</script>

<template>
    <a :href="url" class="btn btn--secondary">
        {{ text }}
    </a>
</template>