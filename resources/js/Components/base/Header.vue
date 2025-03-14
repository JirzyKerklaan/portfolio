<script setup>
import { ref } from 'vue';
import CloseBlack from '../svg/Close_black.vue';
import MenuItem from '../svg/MenuIcon.vue';

// State to manage menu visibility and animation
const isMenuOpen = ref(false);
const isMenuVisible = ref(false);

// Open Menu
const openMenu = () => {
  isMenuVisible.value = true;
  setTimeout(() => {
    isMenuOpen.value = true;
  }, 10); // Small delay to trigger transition
};

// Close Menu
const closeMenu = () => {
  isMenuOpen.value = false;
  setTimeout(() => {
    isMenuVisible.value = false; // Set display: none after sliding out
  }, 300); // Match this to the slide-out transition duration
};
</script>

<template>
  <header class="menu">
    <div class="menu__button" @click="openMenu">
      <span class="menu__text">menu</span>
      <div class="menu__icon">
        <MenuItem />
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
    @click="closeMenu"
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
      <!-- Close button -->
      <div class="menu__close" @click="closeMenu">
        <CloseBlack />
      </div>

      <!-- Inner content -->
      <div class="menu__inner">
        <div class="menu__socials">
          <span>Socials</span>
          <a href="#">LinkedIn</a>
          <a href="#">Instagram</a>
          <a href="#">Github</a>
        </div>
        <div class="menu__links">
          <span>Menu</span>
          <a href="#about">Over mij</a>
          <a href="#projects">Projecten</a>
          <a href="#contact">Contact</a>
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