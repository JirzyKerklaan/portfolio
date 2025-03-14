<script setup>
import Header from '@/Components/base/Header.vue';
import Footer from '@/Components/base/Footer.vue';
import PageHeader from '@/Components/Blocks/PageHeader/PageHeader.vue';
import Quote from '@/Components/Blocks/Quote/Quote.vue';
import TwoCols from '@/Components/Blocks/TwoCols/TwoCols.vue';
import Timeline from '@/Components/Blocks/Timeline/Timeline.vue';
import Skills from '@/Components/Blocks/Skills/Skills.vue';
import Projects from '@/Components/Blocks/Projects/Projects.vue';

</script>
<template>
  <Header />
  <PageHeader />
  <Quote id="about" />
  <TwoCols />
  <Timeline />
  <Skills />
  <Projects id="projects" />
  <Footer id="contact"/>
</template>
