<script setup>
import Layout from "@/Pages/Layouts/Layout.vue";

import Header from '@/Components/Base/Header.vue';
import Footer from '@/Components/Base/Footer.vue';
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
</script>

<template>
    <Layout>
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
    </Layout>
</template>
