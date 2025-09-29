<script setup>
import gsap from "gsap";
import { ScrollToPlugin } from "gsap/ScrollToPlugin";

const emit = defineEmits(["toggleMenu"]);

gsap.registerPlugin(ScrollToPlugin);

window.scrollToElement = (element) => {
    gsap.to(window, {
        duration: 0.15,
        scrollTo: element,
        ease: "ease"
    });
};
</script>

<template>
    <header class="menu">
        <div class="menu__button" @click="emit('toggleMenu')">
            <div class="menu__icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </header>
</template>

