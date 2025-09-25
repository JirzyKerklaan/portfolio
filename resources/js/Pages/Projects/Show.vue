<script setup>
import {computed, ref} from 'vue';
import {Link} from "@inertiajs/vue3";

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
    <div class="projects-view" @scroll="handleScroll">
        <div class="projects-view__inner" ref="projectsViewRef">
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
                <Link as="span" href="/" :preserve-scroll="true" :style="{ '--hover-color': project.color }">
                    Andere projecten bekijken
                </Link>
            </div>
        </div>
    </div>
</template>
