<script setup>
import { onMounted, ref } from 'vue';
import gsap from 'gsap';
import ScrollTrigger from 'gsap/ScrollTrigger';
import Image from '@/Components/base/Image.vue';

gsap.registerPlugin(ScrollTrigger);

let skills = [
    { 'alt': 'Laravel PHP', 'image': 'Laravel.png' },
    { 'alt': 'Vue JS', 'image': 'Vue.png' },
    { 'alt': 'Strapi CMS', 'image': 'Strapi.png' },
    { 'alt': 'Tailwind CSS', 'image': 'Tailwind.png' },
    { 'alt': 'SCSS CSS', 'image': 'SCSS.png' },
    { 'alt': 'Github PMS', 'image': 'Github.png' },
    { 'alt': 'Statamic CMS', 'image': 'Statamic.png' },
    { 'alt': 'React JS', 'image': 'React.png' }
];

const skillsInner = ref(null);

onMounted(() => {
    const container = skillsInner.value;
    const totalWidth = container.scrollWidth - container.clientWidth;

    gsap.to(container, {
        x: -totalWidth,
        ease: 'ease',
        scrollTrigger: {
            trigger: container,
            start: 'top 70%',
            end: 'bottom 15%',
            scrub: true,
        }
    });
});
</script>

<template>
    <div class="block__skills skills">
        <div class="container-xl">
            <div class="skills__inner" ref="skillsInner">
                <div class="skills__image" v-for="skill in skills" :key="skill.alt">
                    <Image :url="'/assets/skills/' + skill.image" :alt="skill.alt" />
                </div>
            </div>
        </div>
    </div>
</template>
