<script setup>
import { ref } from 'vue';

import gsap from "gsap";
import { ScrollToPlugin } from "gsap/ScrollToPlugin";

const isMenuOpen = ref(false);
const isMenuVisible = ref(false);

gsap.registerPlugin(ScrollToPlugin);

const toggleMenu = () => {
  if (isMenuVisible.value === false) {
    isMenuVisible.value = true;
    setTimeout(() => {
      isMenuOpen.value = true;
    }, 10);
  } else {
    isMenuOpen.value = false;
    setTimeout(() => {
      isMenuVisible.value = false;
    }, 300);
  }
};

window.scrollToElement = (element) => {
    gsap.to(window, {
        duration: 0.5,
        scrollTo: element,
        ease: "power2.out"
    });
};
</script>

<template>
  <header class="menu">
    <div class="menu__button" @click="toggleMenu">
      <div class="menu__icon" :class="{'open': isMenuOpen}">
        <span></span>
        <span></span>
      </div>
    </div>
  </header>

  <!-- Overlay -->
  <div
    class="menu__overlay"
    v-if="isMenuVisible"
    :style="{
      opacity: isMenuOpen ? '.75' : '0',
      display: isMenuVisible ? 'block' : 'none',
      transition: 'opacity 0.2s ease'
    }"
    @click="toggleMenu"
  ></div>

  <!-- Sidebar -->
  <div
    class="menu__sidebar"
    v-if="isMenuVisible"
    :style="{
      transform: isMenuOpen ? 'translateX(0)' : 'translateX(100%)',
      display: isMenuVisible ? 'block' : 'none',
      transition: 'transform 0.3s ease'
    }"
  >
    <div class="menu__container">
      <div></div>
      <!-- Inner content -->
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

      <!-- Contact info -->
      <div class="menu__contact">
        <span>Get in touch</span>
        <a href="mailto:jirzykerklaan@gmail.com">
          jirzykerklaan@gmail.com
        </a>
      </div>
    </div>
  </div>
</template>
