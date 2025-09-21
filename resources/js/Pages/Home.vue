<script setup>
import { onMounted, ref } from 'vue';
import { router } from '@inertiajs/vue3';
import { gsap } from 'gsap';
import {ScrollToPlugin} from "gsap/ScrollToPlugin";

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
    workExperiences: Array,
});

gsap.registerPlugin(ScrollToPlugin);

const isAnimating = ref(false);
const targetUrl = ref('');

function openProject(url) {
    if (isAnimating.value) return;

    targetUrl.value = url;
    isAnimating.value = true;

    sessionStorage.setItem('fromProject', 'true');

    const overlay = document.createElement('div');
    overlay.className = 'projects-swipe-overlay';

    gsap.set(overlay, { y: 0, opacity: 1 });

    document.body.appendChild(overlay);

    void overlay.offsetWidth;
    overlay.classList.add('projects-swipe-overlay--active');

    setTimeout(() => {
        router.visit(targetUrl.value, {
            onFinish: () => {
                overlay.remove();
                isAnimating.value = false;
            },
        });
    }, 350);
}

function animateOverlayFromProject() {
    gsap.to(window, {
        duration: 0.15,
        scrollTo: '#projects',
        ease: "ease"
    });

    if (isAnimating.value) return;
    isAnimating.value = true;

    const overlay = document.createElement('div');
    overlay.className = 'projects-swipe-overlay';
    overlay.classList.add('projects-swipe-overlay--active');

    gsap.to(overlay, { y: 0, opacity: 1, duration: 0.01});
    document.body.appendChild(overlay);

    void overlay.offsetWidth;

    gsap.to(overlay, {
        y: '100%',
        opacity: 1.5,
        duration: .85,
        ease: 'none',
        borderTopLeftRadius: '999rem',
        borderTopRightRadius: '999rem',
        onComplete: () => {
            overlay.remove();
            isAnimating.value = false;
            sessionStorage.removeItem('fromProject');
            overlay.classList.remove('projects-swipe-overlay--active');
        },
    });
}

onMounted(() => {
    if (sessionStorage.getItem('fromProject') === 'true') {
        animateOverlayFromProject();
    }
});

</script>

<template>
    <Header />
    <PageHeader />
    <Quote id="about" />
    <Skills />
    <FourCols />
    <WorkExperience
        :work-experiences="workExperiences"
        id="workexperience"
    />
    <Projects
        :projects="projects"
        @open="openProject"
        id="projects"
    />
    <Footer id="contact" />
</template>
