<script setup>
import Work from './Work.vue';

defineProps({
    workExperiences: Array,
})
</script>

<template>
    <div class="block__work-experience we">
        <div class="container-xl">
            <div class="we__inner">
                <template v-for="job in workExperiences" :key="job.id">
                    <Work :job="job" />
                </template>
            </div>
        </div>
    </div>
</template>
