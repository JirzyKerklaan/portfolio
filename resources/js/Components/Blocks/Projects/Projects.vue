<script setup>
import { computed, onMounted, ref } from "vue";
import ProjectsListItem from './ProjectsListItem.vue';
import ProjectsView from './ProjectsView.vue';

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
        'description': "<p>In mijn tijd bij Esens Design heb ik, in opdracht van <a target='_blank' href='https://www.lekkerbezigschiedam.nl/'>Lekker bezig Schiedam</a>, een webapplicatie ontwikkeld voor de jaarlijkse sportverkiezingen. In deze verkiezing kunnen mensen stemmen op hun favoriete sport(st)er, sporttalent en sportclub van het jaar. De applicatie moest beschikken over een specifieke functionaliteit waarbij de gegevens in de database worden opgeslagen en de stemmer zijn of haar stem moet verifiëren via de mail. Tijdens de verkiezingen zijn er in totaal meer dan 1500 stemmen uitgebracht.</p> <p>De code van dit project is te vinden op mijn GitHub.</p>",
        'client': 'Lekkerbezigschiedam',
        'website': 'sportverkiezingenschiedam.nl',
        'github_url': 'https://github.com/JirzyKerklaan/Sportverkiezingen_2024',
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
        'full_site_url': '/assets/projects/portfolio-desktop.jpg',
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
const visible = ref(false);
const fadingOut = ref(false);
const prevImg = ref('');
const prevImgIndex = ref('');
const mouseX = ref(0);
const mouseY = ref(0);
const targetX = ref(0);
const targetY = ref(0);
const speed = 0.1;
const hasSelectedProject = ref(false);
const selectedProject = ref('');
const slideProject = ref(false);
const borderRadius = ref(false);

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

    if (!prevImgIndex.value && prevImgIndex.value !== 0) {
        box.style.backgroundImage = `url('${image}')`;
        nextBox.style.backgroundImage = `url('${image}')`;
        prevImg.value = box.style.backgroundImage;
        prevImgIndex.value = index;
        return;
    }

    let direction = prevImgIndex.value < index ? 'down' : 'up';

    nextBox.style.backgroundImage = `url('${image}')`;

    nextBox.classList.remove('scroll-in', 'start-up', 'start-down');
    nextBox.style.transition = 'none';
    void nextBox.offsetWidth;

    if (direction === 'down') {
        nextBox.classList.add('start-down');
    } else {
        nextBox.classList.add('start-up');
    }

    setTimeout(() => {
        nextBox.style.transition = 'transform 0.35s ease-in-out';
        nextBox.classList.add('scroll-in');
    }, 50);

    setTimeout(() => {
        box.style.backgroundImage = `url('${image}')`;
        prevImg.value = box.style.backgroundImage;
        prevImgIndex.value = index;

        nextBox.classList.remove('scroll-in', 'start-up', 'start-down');
    }, 550);
};

const viewProject = (project) => {
    selectedProject.value = project;
    hasSelectedProject.value = true;
    document.body.style.overflow = 'hidden';
    borderRadius.value = true;

    setTimeout(() => {
        slideProject.value = true;
        borderRadius.value = false;
    }, 250);
}

const closeProject = () => {
    slideProject.value = false;
    borderRadius.value = true;

    setTimeout(() => {
        hasSelectedProject.value = false;
        document.body.style.overflow = 'auto';
    }, 250);
}
</script>

<template>
    <div class="block__projects projects" id="projects">
        <div class="container">
            <div class="projects__inner">
                <div class="projects__title">
                    <h2>Geselecteerde Projecten</h2>
                </div>
                <ul class="projects__list" @mousemove="updatePosition" @mouseenter="showBox" @mouseleave="hideBox" :class="{ 'hide-cursor': visible, 'curved': borderRadius }">
                    <div class="follow-box" id="follow-box" :class="{ fading: fadingOut }" :style="boxStyle">
                        <div class="follow-box__next-image" id="follow-box-next"></div>
                    </div>
                    <li
                        class="projects__list--item" 
                        v-for="(project, i) in projects" 
                        :key="project.url" 
                        @click="viewProject(project)"
                        @mouseenter="updateImage(project.cover_url, i)"
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
