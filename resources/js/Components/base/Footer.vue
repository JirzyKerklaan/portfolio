<script setup>
import JK from '../svg/JK.vue';
import Image from './Image.vue';
import Button from './SecondaryButton.vue';


</script>

<template>
    <footer class="footer" id="contact">
        <div class="footer__overlay"></div>
        <div class="container">
            <div class="footer__outer">
                <div class="footer__inner">
                    <div class="footer__title">
                        <h2>
                            <span>Wil je samenwerken?</span>
                            Neem contact op!
                        </h2>
                    </div>
                    <div class="footer__buttons">
                        <Button url="mailto:jirzykerklaan@gmail.com" text="E-mail" />
                        <Button url="#" text="LinkedIn" />
                    </div>
                    <div class="footer__fineprint">
                        <JK />
                        <p class="footer__fineprint__text">Jirzy Kerklaan</p>
                    </div>
                    <div class="footer__copyright">
                        <p>&copy; Jirzy Kerklaan 2024. All rights reserved. Locatie: Nederland. <br>
                        Deze site toont mijn persoonlijke projecten en professionele werk. <br>
                        Inhoud mag niet zonder mijn toestemming worden gebruikt.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</template>