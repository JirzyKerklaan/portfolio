<script setup>
import { computed, ref } from 'vue';

const props = defineProps({
  closeproject: {
    type: Function,
    required: true
  },
  project: Object
});

let scrollPosition = ref(0);
const maxScrollHeight = 500;

function handleScroll(event) {
  scrollPosition.value = event.target.scrollTop;
}

const imageWidth = computed(() => {
  let width = 80 + (scrollPosition.value / maxScrollHeight) * 26.25;
  if (width > 100) width = 100;
  if (width < 80) width = 80;
  return width;
});
</script>

<template>
    <div class="popup projects-view" @scroll="handleScroll">
        <div class="projects-view__inner">
            <div class="projects-view__title">
                <h1>{{ project.name }}</h1>
            </div>

            <div class="projects-view__image" :style="{ width: imageWidth + '%' }">
                <img :src="project.url">
            </div>
            
            <div class="projects-view__spacer"></div>
            <div class="projects-view__content">
                <div class="projects-view__content--left">
                    <div class="projects-view__description">
                        <div class="left">
                            <p><span>Het project</span></p>
                        </div>

                        <div class="right" v-html="project.description"></div>
                    </div>

                    <div class="projects-view__full-site">
                        <img :src="project.full_site_url">
                    </div>

                </div>
                <div class="projects-view__content--right">
                    <div class="projects-view__info">
                        <p v-if="project.client"><span>Klant: </span>{{ project.client }}</p>
                        <p v-if="project.website"><span>Website: </span><a :href="'https://' + project.website" target="_blank">{{ project.website }}</a></p>
                        <p v-if="project.info" v-for="item in project.info" :key="item.category">
                            <span>{{ item.category }}: </span>{{ item.technologies.join(', ') }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="projects-view__close">
                <span @click="closeproject" :style="{ '--hover-color': project.color }">Andere projecten bekijken</span>
            </div>
        </div>
    </div>
</template>