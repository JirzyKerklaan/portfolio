<script setup>
defineProps({
    name: String,
    task: String,
    i: Number,
});
</script>

<template>
    <div class="projects--project__inner">
        <div class="projects--project__name">
            <h3><span>0{{ i + 1 }}</span>{{ name }}</h3>
        </div>
        <div class="projects--project__task">
            <span>{{task}}</span>
        </div>
    </div>
</template>