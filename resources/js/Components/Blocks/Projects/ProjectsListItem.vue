<script setup>
const props = defineProps({
    name: String,
    task: String,
    i: Number,
    url: String
});

const emit = defineEmits(['open']);

function handleClick() {
    emit('open', '/projecten/'+props.url);
}
</script>

<template>
    <span @click="handleClick" class="projects--project__inner">
        <div class="projects--project__name">
            <h3><span>0{{ i + 1 }}</span>{{ name }}</h3>
        </div>
        <div class="projects--project__task">
            <span>{{task}}</span>
        </div>
    </span>
    <div class="underline"></div>
</template>
