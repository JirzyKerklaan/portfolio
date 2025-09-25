<script setup>
import {Link} from "@inertiajs/vue3";

defineProps({
    name: String,
    task: String,
    i: Number,
    url: String,
});
</script>

<template>
    <Link :href="'/projecten/' + url" :preserve-scroll="true" class="projects--project__inner">
        <div class="projects--project__name">
            <h3><span>0{{ i + 1 }}</span>{{ name }}</h3>
        </div>
        <div class="projects--project__task">
            <span>{{task}}</span>
        </div>
    </Link>
    <div class="underline"></div>
</template>
