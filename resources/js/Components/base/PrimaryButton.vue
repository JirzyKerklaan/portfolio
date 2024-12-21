<script setup>
import Arrow from '../svg/Arrow.vue';

defineProps({
    text: String,
    url: String,
});
</script>

<template>
    <a :href="url" class="btn btn--primary">
        <span class="icon">
            <Arrow />
        </span>
        {{ text }}
    </a>
</template>