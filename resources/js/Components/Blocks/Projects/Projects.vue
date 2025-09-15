<script setup>
import { ref, onMounted } from 'vue'
import ProjectsListItem from "@/Components/Blocks/Projects/ProjectsListItem.vue";
import gsap from 'gsap'
import ProjectsView from "@/Components/Blocks/Projects/ProjectsView.vue";

const currentImage = ref('')
const fadingOut = ref(false)
const followBox = ref(null)
const mouseX = ref(0);
const mouseY = ref(0);
const targetX = ref(0);
const targetY = ref(0);
const speed = 0.15;
const currentHoverIndex = ref(0);
const hasSelectedProject = ref(false);
const selectedProject = ref('');
const slideProject = ref(false);
const borderRadius = ref(false);

let projects = [
    {
        'name': 'Avezaat Cranes',
        'task': 'Full-stack Development',
        'cover_url': '/assets/projects/avezaat.jpg',
        'url': '/assets/projects/avezaat-overview.jpg',
        'full_site_url': '/assets/projects/avezaat-desktop.jpg',
        'description': `<p>Tijdens mijn tijd bij Esens Design heb ik, in opdracht van <a target="_blank" href="https://www.avezaat.com/">Avezaat</a>, een website ontwikkeld die haar diensten op een effectieve manier presenteert.</p><p>De website bevat verschillende informatiepunten, van standaard informatiepagina's tot een nieuwssysteem en diverse projecten die gedetailleerd worden uitgelicht op aparte pagina's.</p>`,
        'client': 'Avezaat',
        'website': 'Avezaat.com',
        'info': [
            { category: 'Frontend', technologies: ['Antlers', 'SCSS'] },
            { category: 'Backend', technologies: ['Laravel', 'MySQL'] },
            { category: 'CMS', technologies: ['Statamic'] }
        ],
        'color': '#FFD500',
    },
    {
        'name': 'Sportverkiezingen 2024',
        'task': 'Full-stack Development',
        'cover_url': '/assets/projects/sportverkiezingen.jpg',
        'url': '/assets/projects/sportverkiezingen-overview.jpg',
        'full_site_url': '/assets/projects/sportverkiezingen-desktop.png',
        'description': "<p>In mijn tijd bij Esens Design heb ik, in opdracht van <a target='_blank' href='https://www.lekkerbezigschiedam.nl/'>Lekker bezig Schiedam</a>, een webapplicatie ontwikkeld voor de jaarlijkse sportverkiezingen. In deze verkiezing kunnen mensen stemmen op hun favoriete sport(st)er, sporttalent en sportclub van het jaar. De stemmen worden opgeslagen in de database, ook moet elke stem geverifiëerd worden. Dit heb ik gedaan door de stemmer een mail te sturen op het ingevulde e-mailadres. Tijdens de verkiezingen zijn er in totaal meer dan 1500 stemmen uitgebracht.</p>",
        'client': 'Lekkerbezigschiedam',
        'website': 'sportverkiezingenschiedam.nl',
        'info': [
            { category: 'Frontend', technologies: ['Antlers', 'SCSS'] },
            { category: 'Backend', technologies: ['Laravel', 'MySQL'] },
            { category: 'CMS', technologies: ['Statamic'] }
        ],
        'color': '#FAED45',
    },
    {
        'name': 'Portfolio',
        'task': 'Design / Full-stack Development',
        'cover_url': '/assets/projects/portfolio.jpg',
        'url': '/assets/projects/portfolio-overview.jpg',
        'full_site_url': '/assets/projects/portfolio-desktop.png',
        'description': '<p>Mijn portfolio is een webapplicatie die ik volledig zelfstandig heb ontworpen en ontwikkeld. De applicatie presenteert mijn projecten en de gebruikte technieken, en geeft een helder beeld van wie ik ben en wat ik kan. Het doel is om mijn werk op een toegankelijke manier te tonen, zodat werkgevers eenvoudig door mijn projecten kunnen bladeren en snel een goed overzicht krijgen van mijn vaardigheden en expertise.</p>',
        'client': 'Eigen project',
        'website': 'jirzykerklaan.nl',
        'github_url': 'https://github.com/JirzyKerklaan/portfolio-v2',
        'info': [
            { category: 'Frontend', technologies: ['Vue', 'SCSS'] },
            { category: 'Backend', technologies: ['Laravel', 'MySQL'] }
        ],
        'color': '#1BDDB1',
    },
    {
        'name': 'Hé - hospitality & events',
        'task': 'Front-end Development',
        'cover_url': '/assets/projects/he.jpg',
        'url': '/assets/projects/he-overview.jpg',
        'full_site_url': '/assets/projects/he-desktop.jpg',
        'description': '<p>In mijn tijd bij Designated heb ik in opdracht van Hé - Hospitality & events een website mogen ontwikkelen. Hé biedt catering, personeel en locaties als service aan, waarmee ze evenementen en zakelijke gelegenheden ondersteunen.</p><p>De klant wilde de verschillende services labelen op kleur, bijvoorbeeld door locaties in paars weer te geven, terwijl de algemene informatiepagina’s in de zwarte stijl moesten worden opgemaakt. Dit bracht een leuke uitdaging met zich mee. Verder bevat de website verschillende formulieren waarmee klanten eenvoudig aanvragen kunnen doen voor personeel, catering of locaties.</p>',
        'client': 'Hé - hospitality & events',
        'website': 'h-e.nl',
        'info': [
            { category: 'Frontend', technologies: ['Vue', 'SCSS'] },
            { category: 'Backend', technologies: ['Laravel', 'MySQL'] },
            { category: 'CMS', technologies: ['Strapi'] }
        ],
        'color': '#F28C47',
    },
];

function showBox() {
    fadingOut.value = false
    gsap.to(followBox.value, { opacity: 1, duration: 0.3 })
}

function hideBox() {
    fadingOut.value = true
    gsap.to(followBox.value, { opacity: 0, duration: 0.3 })
}

function updateImage(url) {
    currentImage.value = url
}

function onMouseMove(event) {
    targetX.value = event.clientX - 137.5;
    targetY.value = event.clientY - 77;
}

function animateFollowBox() {
    const move = () => {
        mouseX.value += (targetX.value - mouseX.value) * speed
        mouseY.value += (targetY.value - mouseY.value) * speed
        gsap.set(followBox.value, { x: mouseX.value, y: mouseY.value })
        requestAnimationFrame(move)
    }
    move()
}

const viewProject = (project) => {
    selectedProject.value = project;
    hasSelectedProject.value = true;
    slideProject.value = false;
    borderRadius.value = true;

    setTimeout(() => {
        document.body.style.overflow = 'hidden';
        slideProject.value = true;
        borderRadius.value = false;
    }, 50);
}

const closeProject = () => {
    borderRadius.value = true;
    slideProject.value = false;
    document.body.style.overflow = 'auto';

    setTimeout(() => {
        hasSelectedProject.value = false;
        borderRadius.value = false;
    }, 300);
}

const scrollImage = (index) => {
    const inner = followBox.value.querySelector('.follow-box__inner')
    gsap.to(inner, {
        duration: 0.5,
        y: -index * 155,
        ease: 'power3.out'
    })
}

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
                        :key="project.url"
                        @click="viewProject(project)"
                        @mouseenter="scrollImage(i)"
                    >
                        <ProjectsListItem :name="project.name" :task="project.task" :i="i" :url="project.url" />
                    </li>
                </ul>
            </div>
        </div>
        <ProjectsView
            v-if="hasSelectedProject"
            :closeproject="closeProject"
            :key="selectedProject.name"
            :project="selectedProject"
            :class="{'project-active': slideProject, 'curved': borderRadius}"
        />
    </div>
</template>
