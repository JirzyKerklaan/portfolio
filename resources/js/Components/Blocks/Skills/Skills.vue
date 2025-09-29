<script setup>
import Image from '@/Components/base/Image.vue';

let skills = [
    { 'alt': 'Laravel PHP', 'image': 'Laravel.png' },
    { 'alt': 'Vue JS', 'image': 'Vue.png' },
    { 'alt': 'Tailwind CSS', 'image': 'Tailwind.png' },
    { 'alt': 'Github PMS', 'image': 'Github.png' },
    { 'alt': 'SCSS CSS', 'image': 'SCSS.png' },
    { 'alt': 'Strapi CMS', 'image': 'Strapi.png' },
    { 'alt': 'Statamic CMS', 'image': 'Statamic.png' },
    { 'alt': 'React JS', 'image': 'React.png' }
];
</script>

<template>
    <div class="block__skills skills">
        <div class="container-xl">
            <div class="skills__inner">
                <div class="skills__image" v-for="skill in skills">
                    <Image :url="'/assets/skills/' + skill.image" :alt="skill.alt" />
                </div>
            </div>
        </div>
    </div>
</template>
