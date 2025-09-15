<script setup>
import { ref, onMounted } from 'vue';
import gsap from 'gsap';

import Header from '@/Components/base/Header.vue';
import Footer from '@/Components/base/Footer.vue';
import PageHeader from '@/Components/Blocks/PageHeader/PageHeader.vue';
import Quote from '@/Components/Blocks/Quote/Quote.vue';
import Skills from '@/Components/Blocks/Skills/Skills.vue';
import Projects from '@/Components/Blocks/Projects/Projects.vue';
import FourCols from '@/Components/Blocks/FourCols/FourCols.vue';
import WorkExperience from '@/Components/Blocks/WorkExperience/WorkExperience.vue';

// Overlay & SVG refs
const overlayRef = ref(null);
const svgRef = ref(null);

onMounted(() => {
    const paths = svgRef.value.querySelectorAll('path');
    document.body.style.overflow = 'hidden';

    paths.forEach(path => {
        const length = path.getTotalLength();

        path.style.stroke = '#0D0D0D';
        path.style.fill = 'none';
        path.style.strokeWidth = '1';
        path.style.strokeDasharray = length;
        path.style.strokeDashoffset = length;

        gsap.to(path, {
            strokeDashoffset: 0,
            duration: 2,
            ease: 'power1.inOut',
            onComplete: () => {
                gsap.to(overlayRef.value, { opacity: 0, duration: 0.75, pointerEvents: 'none' });
                document.body.style.overflow = 'auto';
            }
        });
    });
});
</script>

<template>
    <!-- Page load overlay -->
    <div
        ref="overlayRef"
        class="load__overlay"
    >
        <svg
            ref="svgRef"
            xmlns="http://www.w3.org/2000/svg"
            width="76"
            height="68"
            viewBox="0 0 19 17"
            fill="none"
        >
        <path d="M7.40106 6V0H8.37762V9.28906H8.487L16.9245 0H18.2214L11.2761 7.57031L18.1589 16H16.9401L10.6511 8.27344L8.37762 10.7891V6H7.40106Z" fill="#0D0D0D"/>
        <path d="M7.40947 0H8.38604V11.6484C8.38604 12.7109 8.20114 13.5781 7.83135 14.25C7.46677 14.9219 6.97458 15.4193 6.35479 15.7422C5.7402 16.0599 5.0501 16.2188 4.28447 16.2188C3.50322 16.2188 2.8027 16.0729 2.18291 15.7812C1.56833 15.4844 1.08135 15.0755 0.721974 14.5547C0.362599 14.0339 0.185516 13.4323 0.190724 12.75H1.15947C1.15427 13.25 1.28708 13.6927 1.55791 14.0781C1.83395 14.4583 2.20895 14.7604 2.68291 14.9844C3.15687 15.2031 3.69072 15.3125 4.28447 15.3125C4.85739 15.3125 5.38083 15.1901 5.85479 14.9453C6.32875 14.7005 6.70375 14.3099 6.97979 13.7734C7.26104 13.237 7.40427 12.5286 7.40947 11.6484V0Z" fill="#0D0D0D"/>
        </svg>
    </div>

    <!-- Main page content -->
    <Header />
    <PageHeader />
    <Quote id="about" />
    <Skills />
    <FourCols />
    <WorkExperience id="workexperience" />
    <Projects id="projects" />
    <Footer id="contact"/>
</template>
