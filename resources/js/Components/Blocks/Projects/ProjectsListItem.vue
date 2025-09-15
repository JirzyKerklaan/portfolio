<script setup>
import gsap from 'gsap'
import ScrollTrigger from 'gsap/ScrollTrigger'
import {onMounted} from "vue";

defineProps({
    name: String,
    task: String,
    i: Number,
    url: String
});

gsap.registerPlugin(ScrollTrigger)

const animateProjectUnderlines = () => {
    const elements = document.querySelectorAll('.projects__list--item .underline')

    elements.forEach((el, index) => {
        gsap.to(el, {
            scaleX: 1,
            ease: 'power2.out',
            transformOrigin: 'left',
            scrollTrigger: {
                trigger: el.parentElement,
                start: `top+=${index * 100} 70%`,
                end: `top+=${index * 100 + 200} 95%`,
                scrub: true,
            }
        })
    })
}


onMounted(() => {
   animateProjectUnderlines()
});

</script>

<template>
    <div class="projects--project__inner">
        <div class="projects--project__name">
            <h3><span>0{{ i + 1 }}</span>{{ name }}</h3>
        </div>
        <div class="projects--project__task">
            <span>{{task}}</span>
        </div>
    </div>
    <div class="underline"></div>
</template>
