<script setup>
import Header from '@/Components/base/Header.vue';
import Footer from '@/Components/base/Footer.vue';
import Pagebuilder from '@/Components/Blocks/Pagebuilder/Pagebuilder.vue';
import Quote from '@/Components/Blocks/Quote/Quote.vue';
import TwoCols from '@/Components/Blocks/TwoCols/TwoCols.vue';
import Skills from '@/Components/Blocks/Skills/Skills.vue';
import Projects from '@/Components/Blocks/Projects/Projects.vue';
</script>

<template>
    <!-- <Header /> -->
    <Pagebuilder />
    <Quote />
    <TwoCols />
    
    <Skills/>
    <Projects />
    <Footer />
</template>