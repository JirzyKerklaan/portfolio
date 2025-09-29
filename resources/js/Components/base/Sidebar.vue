<script setup>
defineProps({
    isMenuVisible: Boolean,
    isMenuOpen: Boolean
});

defineEmits(["toggle"]);
</script>

<template>
    <div
        class="menu__overlay"
        @click="$emit('toggle')"
        style="opacity: 0;"
    ></div>

    <div class="menu__sidebar" style="transform: translateX(100%);">
        <div class="menu__container">
            <div></div>
            <div class="menu__inner">
                <div class="menu__socials">
                    <span>Socials</span>
                    <a href="https://www.linkedin.com/in/jirzy-kerklaan" target="_blank">LinkedIn</a>
                    <a href="https://www.instagram.com/jirzy_vld/" target="_blank">Instagram</a>
                    <a href="https://github.com/JirzyKerklaan/" target="_blank">Github</a>
                </div>
                <div class="menu__links">
                    <span>Menu</span>
                    <span class="menu__link" onclick="scrollToElement('#about')">Over mij</span>
                    <span class="menu__link" onclick="scrollToElement('#workexperience')">Werk ervaring</span>
                    <span class="menu__link" onclick="scrollToElement('#projects')">Projecten</span>
                    <span class="menu__link" onclick="scrollToElement('#contact')">Contact</span>
                </div>
            </div>

            <div class="menu__contact">
                <span>Get in touch</span>
                <a href="mailto:jirzykerklaan@gmail.com">
                    jirzykerklaan@gmail.com
                </a>
            </div>
        </div>
    </div>
</template>

