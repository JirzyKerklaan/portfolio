<script setup>
import { computed, ref } from 'vue';
import { Link } from "@inertiajs/vue3";

const props = defineProps({
    project: Object
});

const scrollPosition = ref(0);
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

const groupedTechnologies = computed(() => {
    return props.project.technologies.reduce((acc, tech) => {
        if (!acc[tech.category]) acc[tech.category] = [];
        acc[tech.category].push(tech.technology);
        return acc;
    }, {});
});
</script>

<template>
    <transition name="swipe-up" mode="out-in" appear>
        <div class="projects-view" @scroll="handleScroll">
            <div class="projects-view__inner">
                <div class="projects-view__title">
                    <h1>{{ project.name }}</h1>
                </div>

                <div class="projects-view__image" :style="{ width: imageWidth + '%' }">
                    <img :src="project.thumbnail_url">
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
                            <p v-if="project.client"><span>Voor: </span>{{ project.client }}</p>
                            <p v-if="project.website"><span>Website: </span><a :href="'https://' + project.website" target="_blank">{{ project.website }}</a></p>
                            <p v-if="project.github_url"><span>Github: </span><a :href="project.github_url" target="_blank">Op Github bekijken</a></p>
                            <p v-if="groupedTechnologies" v-for="(techs, category) in groupedTechnologies" :key="category">
                                <span>{{ category }}: </span> {{ techs.join(', ') }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="projects-view__close">
                    <Link as="span" href="/" :style="{ '--hover-color': project.color }">Andere projecten bekijken</Link>
                </div>
            </div>
        </div>
    </transition>
</template>

<style scoped>
.projects-view {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: #0d0d0d;
    overflow-y: auto;
    box-shadow: 0 -10px 30px rgba(0,0,0,0.1);
    transform: translateY(0); /* start fully visible */
}

/* ENTER: Home -> Project */
.swipe-up-enter-from {
    transform: translateY(100%);
    border-top-left-radius: 100%;
    border-top-right-radius: 100%;
}
.swipe-up-enter-to {
    transform: translateY(0);
    border-top-left-radius: 0;
    border-top-right-radius: 0;
}
.swipe-up-enter-active {
    transition: transform 0.5s ease, border-radius 0.5s ease;
}

/* LEAVE: Project -> Home */
.swipe-up-leave-from {
    transform: translateY(0);
}
.swipe-up-leave-to {
    transform: translateY(100%);
}
.swipe-up-leave-active {
    transition: transform 0.5s ease, border-radius 0.5s ease;
}
</style>
