<script setup>
import Header from '@/Components/base/Header.vue';
import Footer from '@/Components/base/Footer.vue';
import PageHeader from '@/Components/Blocks/PageHeader/PageHeader.vue';
import Quote from '@/Components/Blocks/Quote/Quote.vue';
import Skills from '@/Components/Blocks/Skills/Skills.vue';
import Projects from '@/Components/Blocks/Projects/Projects.vue';
import FourCols from '@/Components/Blocks/FourCols/FourCols.vue';
import WorkExperience from '@/Components/Blocks/WorkExperience/WorkExperience.vue';

defineExpose({
    transition: 'fade',
});

defineProps({
    projects: Array,
    workExperiences: Array,
});
</script>

<template>
    <main>
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
            id="projects"
        />
        <Footer id="contact" />
    </main>
</template>
