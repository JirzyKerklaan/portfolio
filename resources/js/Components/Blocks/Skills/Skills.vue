<script setup>
import Button from '@/Components/base/SecondaryButton.vue';

let skills = ['HTML', 'Javascript', 'Github', 'GSAP', 'React', 'Typescript', 'CSS', 'PHP/Laravel', 'Figma'];
</script>

<template>
    <div class="block__skills skills">
        <div class="container-xl">
            <div class="skills__inner">
                <div class="skills__title">
                    <h2>Mijn tech stack</h2>
                </div>
                <div class="skills__box">
                    <Button v-for="skill in skills" :key="skill" :text="skill"/>
                </div>
            </div>
        </div>
    </div>
</template>
