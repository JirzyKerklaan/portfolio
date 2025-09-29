<script setup>
import { ref } from "vue";
import { gsap } from "gsap";
import { ScrollToPlugin } from "gsap/ScrollToPlugin";
import { router } from "@inertiajs/vue3";

import Header from '@/Components/base/Header.vue';
import Footer from '@/Components/base/Footer.vue';
import PageHeader from '@/Components/Blocks/PageHeader/PageHeader.vue';
import Quote from '@/Components/Blocks/Quote/Quote.vue';
import Skills from '@/Components/Blocks/Skills/Skills.vue';
import Projects from '@/Components/Blocks/Projects/Projects.vue';
import FourCols from '@/Components/Blocks/FourCols/FourCols.vue';
import WorkExperience from '@/Components/Blocks/WorkExperience/WorkExperience.vue';
import Sidebar from "@/Components/base/Sidebar.vue";

defineProps({
    projects: Array,
    workExperiences: Array,
});

gsap.registerPlugin(ScrollToPlugin);

const isMenuVisible = ref(false);
const isMenuOpen = ref(false);

const toggleMenu = () => {
    isMenuVisible.value = true;
    isMenuOpen.value = !isMenuOpen.value;

    if (isMenuOpen.value) {
        gsap.to(".menu__sidebar", { x: 0, duration: 0.3, ease: "power3.out" });
        gsap.to("main", {
            marginLeft: "-30%",
            marginRight: "30%",
            duration: 0.45,
            ease: "power3.out",
        });
    } else {
        gsap.to("main", {
            marginLeft: "0%",
            marginRight: "0%",
            duration: 0.3,
            ease: "power3.inOut",
        });
        gsap.to(".menu__sidebar", {
            x: "100%",
            duration: 0.45,
            ease: "power3.inOut",
            onComplete: () => {
                isMenuVisible.value = false;
            },
        });
    }
};
</script>

<template>
    <Sidebar :is-menu-visible="isMenuVisible" :is-menu-open="isMenuOpen" @toggle="toggleMenu" />
    <main>
        <Header @toggleMenu="toggleMenu" />
        <PageHeader />
        <Quote id="about" />
        <FourCols />
        <Skills />
        <WorkExperience :work-experiences="workExperiences" id="workexperience" />
        <Projects :projects="projects" @open="openProject" id="projects" />
        <Footer id="contact" />
    </main>
</template>
