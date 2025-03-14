<script setup>
import { computed, ref, watchEffect } from "vue";
import ProjectsListItem from './ProjectsListItem.vue';
import ProjectsView from './ProjectsView.vue';

let projects = [
    {
        'name': 'Sportverkiezingen 2024',
        'task': 'Full-stack Development',
        'url': '/assets/projects/thrivehealth.jpg',
    },
    {
        'name': 'Portfolio',
        'task': 'Full-stack Development / Design',
        'url': '/assets/projects/Kickstart.jpg',
    },
    {
        'name': 'Thrive Health',
        'task': 'Front-end Development',
        'url': '/assets/projects/thrivehealth.jpg',
    },
    {
        'name': 'Hé - hospitality & events',
        'task': 'Front-end Development',
        'url': '/assets/projects/Kickstart.jpg',
    },
];

const mouseX = ref(0);
const mouseY = ref(0);
const visible = ref(false);
const fadingOut = ref(false);
const prevImg = ref('');

const updatePosition = (event) => {
  mouseX.value = event.pageX - 125;
  mouseY.value = event.pageY - 50;
};

const showBox = () => {
  visible.value = true;
  fadingOut.value = false;
};

const hideBox = () => {
  fadingOut.value = true;
  setTimeout(() => {
    visible.value = false;
  }, 300);
};

const boxStyle = computed(() => ({
  left: `${mouseX.value}px`,
  top: `${mouseY.value}px`,
}));

const updateImage = (image) => {
    const box = document.getElementById('follow-box');
    console.log(prevImg.value)
    
    if (box) {
        prevImg.value = box.style.backgroundImage;
        box.style.backgroundImage = `url('${image}')`;
    }
};
</script>

<template>
    <div class="block__projects projects" id="projects">
        <div class="container">
            <div class="projects__inner">
                <div class="projects__title">
                    <h2>Geselecteerde Projecten</h2>
                </div>
                <ul class="projects__list" @mousemove="updatePosition" @mouseenter="showBox" @mouseleave="hideBox" :class="{ 'hide-cursor': visible }">
                    <div class="follow-box" id="follow-box" :class="{ fading: fadingOut }" :style="boxStyle">
                        <div class="follow-box__next-image">
                        </div>
                    </div>
                    <li
                        class="projects__list--item" 
                        v-for="(project, i) in projects" 
                        :key="project.url" 
                        @mouseenter="updateImage(project.url)"
                        >
                        <ProjectsListItem :name="project.name" :task="project.task" :i="i" :url="project.url" />
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- <ProjectsView /> -->
</template>
