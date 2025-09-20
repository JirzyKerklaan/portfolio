<script setup>
import Work from './Work.vue';

let jobs = [
    {
        'company': 'Goedemiddag!',
        'time': 'AUG 2025 - HEDEN',
        'function': 'Full-stack developer',
        'location': 'Delft',
        'website_link': 'https://goedemiddag.nl/',
        'website_label': 'goedemiddag.nl',
        'description': '<p>Bij Goedemiddag! ben ik in dienst als Full-stack developer. Hier werk ik aan complexe en schaalbare webapplicaties.</p>'
    },
    {
        'company': 'Esens',
        'time': 'SEP 2024 - JUL 2025',
        'function': 'Full-stack developer',
        'location': 'Rotterdam',
        'website_link': 'https://esens.nl/',
        'website_label': 'esens.nl',
        'description': '<p>Als full-stack developer bij Esens heb ik voor veel verschillende klanten complexe, schaalbare websites gebouwd.</p>'
    },
    {
        'company': 'Designated',
        'time': 'SEP 2023 - APR 2024',
        'function': 'Front-end developer',
        'location': 'Zoetermeer',
        'website_link': 'https://designated.nl/',
        'website_label': 'designated.nl',
        'description': '<p>Tijdens mijn stage bij Designated was ik in dienst als front-end developer. Hier heb ik veel geleerd over de manier van werken binnen de structuur van een digitaal marketingbureau.</p>'
    }
]
</script>

<template>
    <div class="block__work-experience we">
        <div class="container-xl">
            <div class="we__inner">
                <template v-for="job in jobs">
                    <Work :job="job" />
                </template>
            </div>
        </div>
    </div>
</template>
