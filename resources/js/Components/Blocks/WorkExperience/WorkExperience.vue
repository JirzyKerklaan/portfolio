<script setup>
import Work from './Work.vue';

let jobs = [
    {
        'company': 'Goedemiddag!',
        'company_desc': 'Bouwt apps voor diverse klanten',
        'time': 'AUG 2025 - HEDEN',
        'function': 'Full-stack developer',
        'location': 'Delft',
        'website_link': 'https://goedemiddag.nl/',
        'website_label': 'goedemiddag.nl',
        'description': '<p>Als full-stack developer bij Goedemiddag! heb ik gewerkt aan complexe, schaalbare en gebruiksvriendelijke webapplicaties.</p>'
    },
    {
        'company': 'Esens',
        'company_desc': 'Creatief bureau met 23 jaar ervaring',
        'time': 'SEP 2024 - JUL 2025',
        'function': 'Full-stack developer',
        'location': 'Rotterdam',
        'website_link': 'https://esens.nl/',
        'website_label': 'esens.nl',
        'description': '<p>Als full-stack developer bij Esens heb ik voor veel verschillende klanten complexe, schaalbare websites gebouwd.</p>'
    },
    {
        'company': 'Designated',
        'company_desc': 'Startup digitaal marketingbureau',
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
