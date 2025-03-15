<script setup>
defineProps({
    text: String,
    url: String,
    blank: Boolean,
});
</script>

<template>
    <a :href="url" class="btn btn--secondary" :target="blank ? '_blank' : '_self'">
        <span>
            {{ text }}
        </span>
    </a>
</template>