<script setup>
defineProps({
    text: String,
    url: String,
});
</script>

<template>
    <a :href="url" class="btn btn--secondary">
        <span>
            {{ text }}
        </span>
    </a>
</template>