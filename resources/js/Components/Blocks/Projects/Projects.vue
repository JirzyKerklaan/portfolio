<script setup>
import ProjectsListItem from './ProjectsListItem.vue';

let projects = [
    {
        'name': 'Sportverkiezingen 2024',
        'task': 'Full-stack Development'
    },
    {
        'name': 'Portfolio',
        'task': 'Full-stack Development / Design'
    },
    {
        'name': 'Thrive Health',
        'task': 'Front-end Development'
    },
    {
        'name': 'Hé - hospitality & events',
        'task': 'Front-end Development'
    },
    {
        'name': 'E-mail campagnes',
        'task': 'Development'
    },
]
</script>

<template>
    <div class="block__projects projects">
    <div class="container">
        <div class="projects__inner">
            <div class="projects__title">
                <h2>Geselecteerde Projecten</h2>
            </div>
            <ul class="projects__list">
                <li class="projects__list--item" v-for="project, i in projects">
                    <ProjectsListItem :name="project.name" :task="project.task" :i="i" />
                </li>
            </ul>
        </div>
    </div>
    </div>
</template>