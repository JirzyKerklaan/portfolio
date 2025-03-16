<script setup>
import Arrow from '@/Components/svg/Arrow.vue';
import Close from '@/Components/svg/Close.vue';

// Define props to receive the toggleProjectView method
const props = defineProps({
    closeproject: {
    type: Function,
    required: true
  },
  project: Object
});
</script>

<template>
    <div class="popup projects-view">
        <div class="projects-view__close popup-close" @click="closeproject">
            <Close />
        </div>
        <div class="projects-view__overlay" :style="{ background: `radial-gradient(circle, ${project.color} 0%, transparent 70%)` }"></div>
        <div class="container">
            <div class="projects-view__head">
                <h1>{{ project.name }}</h1>
                <a :href="project.external_url" target="_blank">
                    <Arrow />
                </a>
            </div>
            <div class="projects-view__inner">
                <div class="projects-view__two-cols">
                    <div class="projects-view__column" v-if="project.description">
                        <div class="projects-view__title">
                            <h2>Beschrijving</h2>
                        </div>
                        <div class="projects-view__text" v-html="project.description"></div>
                    </div>
                    <div class="projects-view__column sm" :v-if="project.tech">
                        <div class="projects-view__title">
                            <h2>Technieken</h2>
                        </div>
                        <div class="projects-view__text">
                            <p v-for="item in project.tech" :key="item.category">
                                <span>{{ item.category }}: </span>{{ item.technologies.join(', ') }}
                            </p>
                        </div>
                        <div class="projects-view__text"></div>
                    </div>
                </div>

                <div class="projects-view__image" :style="{ backgroundImage: `url(${project.url})` }"></div>
            </div>
        </div>
    </div>
</template>