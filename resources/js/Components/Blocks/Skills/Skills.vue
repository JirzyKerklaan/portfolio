<script setup>
import Image from '@/Components/Base/Image.vue';

    let skills = [
        {
            'alt': 'Laravel PHP',
            'image': 'Laravel.png'
        },
        {
            'alt': 'Vue JS',
            'image': 'Vue.png'
        },
        {
            'alt': 'Strapi CMS',
            'image': 'Strapi.png'
        },
        {
            'alt': 'Tailwind CSS',
            'image': 'Tailwind.png'
        },
        {
            'alt': 'SCSS CSS',
            'image': 'SCSS.png'
        },
        {
            'alt': 'Github PMS',
            'image': 'Github.png'
        },
        {
            'alt': 'Statamic CMS',
            'image': 'Statamic.png'
        },
        {
            'alt': 'React JS',
            'image': 'React.png'
        }
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
