<script setup>
import { ref } from 'vue';
import {router} from '@inertiajs/vue3';

import Header from '@/Components/base/Header.vue';
import Footer from '@/Components/base/Footer.vue';
import PageHeader from '@/Components/Blocks/PageHeader/PageHeader.vue';
import Quote from '@/Components/Blocks/Quote/Quote.vue';
import Skills from '@/Components/Blocks/Skills/Skills.vue';
import Projects from '@/Components/Blocks/Projects/Projects.vue';
import FourCols from '@/Components/Blocks/FourCols/FourCols.vue';
import WorkExperience from '@/Components/Blocks/WorkExperience/WorkExperience.vue';

defineProps({
    projects: Array,
})

const isAnimating = ref(false);
const targetUrl = ref('');

function openProject(url) {
    if (isAnimating.value) return;

    targetUrl.value = url;
    isAnimating.value = true;

    const overlay = document.createElement('div');
    overlay.className = 'projects-swipe-overlay';
    document.body.appendChild(overlay);

    void overlay.offsetWidth;

    overlay.classList.add('projects-swipe-overlay--active');

    setTimeout(() => {
        router.visit(targetUrl.value, {
            onFinish: () => {
                overlay.remove();
                isAnimating.value = false;
            }
        });
    }, 500);
}

</script>

<template>
    <Header />
    <PageHeader />
    <Quote id="about" />
    <Skills />
    <FourCols />
    <WorkExperience id="workexperience" />
    <Projects
        :projects="projects"
        @open="openProject"
        id="projects"
    />
    <Footer id="contact"/>
</template>
