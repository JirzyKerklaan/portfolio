<script setup>
import {ref, onMounted, onBeforeMount} from 'vue'
import ProjectsListItem from "@/Components/Blocks/Projects/ProjectsListItem.vue";
import gsap from 'gsap'

const fadingOut = ref(false)
const followBox = ref(null)
const mouseX = ref(0);
const mouseY = ref(0);
const targetX = ref(0);
const targetY = ref(0);
const speed = 0.15;

defineProps({
    projects: Object,
})
function showBox() {
    fadingOut.value = false
    gsap.to(followBox.value, { opacity: 1, duration: 0.3 })
}

function hideBox() {
    fadingOut.value = true
    gsap.to(followBox.value, { opacity: 0, duration: 0.3 })
}

function onMouseMove(event) {
    targetX.value = event.clientX - 137.5;
    targetY.value = event.clientY - 77;
}

const animateFollowBox = () => {
    const move = () => {
        if (!followBox.value) return;
        mouseX.value += (targetX.value - mouseX.value) * speed
        mouseY.value += (targetY.value - mouseY.value) * speed
        gsap.set(followBox.value, { x: mouseX.value, y: mouseY.value })
        requestAnimationFrame(move)
    }
    move()
}

const scrollImage = (index) => {
    const inner = followBox.value.querySelector('.follow-box__inner')
    gsap.to(inner, {
        duration: 0.5,
        y: -index * 155,
        ease: 'power3.out'
    })
}
onBeforeMount(() => {
    hideBox();
})

onMounted(() => {
    hideBox();
    animateFollowBox();
})

</script>

<template>
    <div class="block__projects projects" id="projects">
        <div class="container">
            <div class="projects__inner">
                <div class="projects__title">
                    <h2>Geselecteerde Projecten</h2>
                </div>
                <ul
                    class="projects__list hide-cursor"
                    @mousemove="onMouseMove"
                    @mouseenter="showBox"
                    @mouseleave="hideBox"
                >
                    <div
                        class="follow-box"
                        ref="followBox"
                        :class="{ fading: fadingOut }"
                    >
                        <div class="follow-box__inner">
                            <div
                                class="follow-box__next-image"
                                v-for="(project, i) in projects"
                                :key="i"
                                :style="{ backgroundImage: `url(${project.cover_url})` }"
                            ></div>
                        </div>
                    </div>
                    <li
                        class="projects__list--item"
                        v-for="(project, i) in projects"
                        :key="project.thumbnail_url"
                        @mouseenter="scrollImage(i)"
                    >
                        <ProjectsListItem
                            :name="project.name"
                            :task="project.task"
                            :i="i"
                            :url="project.url"
                            @open="$emit('open', $event)"
                        />
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>
