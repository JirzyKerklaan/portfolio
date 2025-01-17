<script setup>
import ProjectsListItem from './ProjectsListItem.vue';
import ProjectsView from './ProjectsView.vue';

let projects = [
    {
        'name': 'Sportverkiezingen 2024',
        'task': 'Full-stack Development',
        'url': '/assets/projects/Kickstart.jpg',
    },
    {
        'name': 'Portfolio',
        'task': 'Full-stack Development / Design',
        'url': '/assets/projects/Thrive.jpg',
    },
    {
        'name': 'Thrive Health',
        'task': 'Front-end Development',
        'url': '/assets/projects/Kickstart.jpg',
    },
    {
        'name': 'Hé - hospitality & events',
        'task': 'Front-end Development',
        'url': '/assets/projects/Thrive.jpg',
    },
];
</script>

<template>
    <div class="block__projects projects" id="projects">
        <div class="container">
            <div class="projects__inner">
                <div class="projects__title">
                    <h2>Geselecteerde Projecten</h2>
                </div>
                <ul class="projects__list">
                    <!-- Use @click instead of :onclick, and don't call the function immediately -->
                    <li
                        class="projects__list--item" 
                        v-for="(project, i) in projects" 
                        :key="project.url" 
                        :data-thumbnail="project.url">
                        <ProjectsListItem :name="project.name" :task="project.task" :i="i" :url="project.url" />
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- <ProjectsView /> -->
</template>
