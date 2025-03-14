<script setup>
import { computed, onMounted, ref, watchEffect } from "vue";
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

const visible = ref(false);
const fadingOut = ref(false);
const prevImg = ref('');
const prevImgIndex = ref('');
const mouseX = ref(0);
const mouseY = ref(0);
const targetX = ref(0);
const targetY = ref(0);
const speed = 0.1;

const updatePosition = (event) => {
  targetX.value = event.pageX - 125;
  targetY.value = event.pageY - 50;
};

const showBox = () => {
  visible.value = true;
  fadingOut.value = false;
};

const hideBox = () => {
  fadingOut.value = true;
  prevImg.value = '';
  prevImgIndex.value = '';
  setTimeout(() => {
    visible.value = false;
  }, 300);
};

const animate = () => {
  mouseX.value += (targetX.value - mouseX.value) * speed;
  mouseY.value += (targetY.value - mouseY.value) * speed;
  requestAnimationFrame(animate);
};

onMounted(() => {
    animate();
    hideBox();
});

const boxStyle = computed(() => ({
    left: `${mouseX.value}px !important`,
    top: `${mouseY.value}px !important`,
}));

const updateImage = (image, index) => {
    const box = document.getElementById('follow-box');
    const nextBox = document.getElementById('follow-box-next');

    if (!box || !nextBox) return;

    // If prevImgIndex is not set, just update images without animation
    if (!prevImgIndex.value && prevImgIndex.value !== 0) {
        box.style.backgroundImage = `url('${image}')`;
        nextBox.style.backgroundImage = `url('${image}')`;
        prevImg.value = box.style.backgroundImage;
        prevImgIndex.value = index;
        return;
    }

    let direction = prevImgIndex.value < index ? 'down' : 'up';

    // Set the new image before animation starts
    nextBox.style.backgroundImage = `url('${image}')`;

    // Remove all transition classes & disable animation
    nextBox.classList.remove('scroll-in', 'start-up', 'start-down');
    nextBox.style.transition = 'none'; // Disable transition initially
    void nextBox.offsetWidth; // Force reflow

    // Apply starting position
    if (direction === 'down') {
        nextBox.classList.add('start-down'); // Start below
    } else {
        nextBox.classList.add('start-up'); // Start above
    }

    // Re-enable transition and animate in
    setTimeout(() => {
        nextBox.style.transition = 'transform 0.5s ease-in-out';
        nextBox.classList.add('scroll-in');
    }, 50); // Small delay to allow reflow

    // Wait for animation to finish, then swap images
    setTimeout(() => {
        box.style.backgroundImage = `url('${image}')`;
        prevImg.value = box.style.backgroundImage;
        prevImgIndex.value = index;

        // Reset classes for next animation
        nextBox.classList.remove('scroll-in', 'start-up', 'start-down');
    }, 550);
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
                        <div class="follow-box__next-image" id="follow-box-next"></div>
                    </div>
                    <li
                        class="projects__list--item" 
                        v-for="(project, i) in projects" 
                        :key="project.url" 
                        @mouseenter="updateImage(project.url, i)"
                        >
                        <ProjectsListItem :name="project.name" :task="project.task" :i="i" :url="project.url" />
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- <ProjectsView /> -->
</template>
