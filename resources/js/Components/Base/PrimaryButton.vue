<script setup>
import Arrow from '../svg/Arrow.vue';

defineProps({
    text: String,
    url: String,
    blank: Boolean,
});
</script>

<template>
    <a :href="url" class="btn btn--primary" :target="blank ? '_blank' : '_self'">
        <span class="icon">
            <Arrow />
        </span>
        <span>
            {{ text }}
        </span>
    </a>
</template>