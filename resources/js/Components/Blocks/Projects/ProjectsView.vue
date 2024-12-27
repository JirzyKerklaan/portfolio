<script setup>
import Arrow from '@/Components/svg/Arrow.vue';
import Close from '@/Components/svg/Close.vue';

// Define props to receive the toggleProjectView method
const props = defineProps({
  toggleProjectView: {
    type: Function,
    required: true
  }
});
</script>

<template>
    <div class="popup projects-view">
        <div class="projects-view__close popup-close" @click="toggleProjectView">
            <Close />
        </div>
        <div class="projects-view__overlay"></div>
        <div class="container">
            <div class="projects-view__head">
                <h1>Sportverkiezingen 2024</h1>
                <a href="#">
                    <Arrow />
                </a>
            </div>
            <div class="projects-view__inner">
                <div class="projects-view__two-cols">
                    <div class="projects-view__column">
                        <div class="projects-view__title">
                            <h2>Beschrijving</h2>
                        </div>
                        <div class="projects-view__text">
                            <p>In mijn tijd bij Esens Design heb ik in opdracht van <a href="https://lekkerbezigschiedam.nl/">Lekker bezig Schiedam</a> een
                                webapplicatie ontwikkeld voor de jaarlijkse sportverkiezingen. In deze verkiezing kunnen
                                mensen stemmen op hun favoriete sport(st)er, sporttalent en sportclub van het jaar. De
                                applicatie moest beschikken over een specifieke functionaliteit waarbij de gegevens in
                                de database worden opgeslagen en de klant zijn of haar stem moet verifiëren via de mail
                                voordat de stem geldig is.</p>
                            <p>De code van dit project is te vinden op mijn Github, maar het project is momenteel niet
                                live beschikbaar.</p>
                        </div>
                    </div>
                    <div class="projects-view__column">
                        <div class="projects-view__title">
                            <h2>Technieken</h2>
                        </div>
                        <div class="projects-view__text">
                                <p><span>Frontend: </span>Antlers, SCSS</p>
                                <p><span>Backend: </span>Laravel, MySQL</p>
                                <p><span>CMS: </span>Statamic</p>
                        </div>
                        <div class="projects-view__text"></div>
                    </div>
                </div>

                <div class="projects-view__image" style="background-image: url('/assets/projects/Kickstart.jpg');">
                </div>
            </div>
        </div>
    </div>
</template>