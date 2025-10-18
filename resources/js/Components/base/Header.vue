<script setup>
import gsap from "gsap";
import { ScrollToPlugin } from "gsap/ScrollToPlugin";
import {onMounted, onUnmounted} from "vue";

const emit = defineEmits(["toggleMenu"]);

gsap.registerPlugin(ScrollToPlugin);

window.scrollToElement = (element) => {
    emit('toggleMenu');

    gsap.to(window, {
        duration: 0.15,
        scrollTo: element,
        ease: "ease"
    });
};

const handleScroll = () => {
    const isScrolled = window.scrollY > window.innerHeight - 80;

    gsap.to(".menu__icon div", {
        color: isScrolled ? "#0d0d0d" : "#ffffff",
        duration: 0.3,
        ease: "power2.out",
    });
};

onMounted(() => {
    window.addEventListener("scroll", handleScroll);
});

onUnmounted(() => {
    window.removeEventListener("scroll", handleScroll);
});
</script>

<template>
    <header class="menu">
        <div class="menu__button" @click="emit('toggleMenu')">
            <div class="menu__icon">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </header>
</template>

