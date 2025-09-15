<script setup>
const props = defineProps({
    job: Object,
});
</script>

<template>
    <div class="we__job">
        <div class="job__company">{{job.company}}</div>

        <div class="job__cols">
            <div class="job__col">
                <div class="job__short-desc">
                    <p>{{job.company_desc}}</p>
                </div>
                <div class="job__time">
                    <p>{{job.time}}</p>
                </div>
            </div>

            <div class="job__col">
                <div class="job__function job__spacer">
                    <p><span>Functie</span> {{job.function}}</p>
                </div>
                <div class="job__location job__spacer">
                    <p><span>Locatie</span> {{job.location}}</p>
                </div>
                <div class="job__site job__spacer">
                    <p><span>Website</span><a :href="job.website_link" target="_blank">{{job.website_label}}</a></p>
                </div>
            </div>

            <div class="job__col">
                <div class="job__description" v-html="job.description"></div>
            </div>
        </div>
    </div>
</template>
