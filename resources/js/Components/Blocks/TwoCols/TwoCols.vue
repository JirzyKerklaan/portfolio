<script setup>
import Button from '@/Components/base/PrimaryButton.vue';

</script>

<template>
    <div class="block__two-cols two-cols" id="about">
        <div class="container">
            <div class="two-cols__inner">
                <span class="two-cols__subtitle">
                    Dit ben ik.
                </span>

                <div class="two-cols__columns">
                    <div class="two-cols__column">
                        <div class="two-cols__title">
                            <h2>Hi, ik ben Jirzy</h2>
                        </div>
                    </div>
                    <div class="two-cols__column">
                        <div class="two-cols__text">
                            <p>Als 19-jarige full-stack software developer zet ik ideeën om in innovatieve oplossingen.
                                Gespecialiseerd in ontwikkeling, testen en lancering, zorg ik voor goed afgewerkte en
                                betrouwbare eindresultaten.</p>
                        </div>
                    </div>
                    <div class="two-cols__column button">
                        <div class="two-cols__button">
                            <Button text="Contact opnemen" url="mailto:jirzykerklaan@gmail.com" />
                        </div>
                    </div>
                    <div class="two-cols__column">
                        <div class="two-cols__text">
                            <p>Mijn werkwijze is hands-on en gericht op het bouwen van hoogwaardige, schaalbare
                                applicaties die gebruikerservaringen verbeteren en aan klantbehoeften voldoen.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>