<script setup>
import {onMounted, ref} from "vue";
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

const toggleMenu = () => {
    isMenuVisible.value = true;
    isMenuOpen.value = !isMenuOpen.value;
    document.querySelector('.menu__icon').classList.toggle('open');

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


onMounted(() => {
    if (sessionStorage.getItem('fromProject') === 'true') {
        animateOverlayFromProject();
    }
});
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
