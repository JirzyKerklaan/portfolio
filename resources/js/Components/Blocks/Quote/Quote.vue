<script setup>
import { onMounted, ref, nextTick } from 'vue'
import gsap from 'gsap'
import ScrollTrigger from 'gsap/ScrollTrigger'
import SplitText from 'gsap/SplitText'

gsap.registerPlugin(ScrollTrigger, SplitText)

const quoteRef = ref(null)

onMounted(async () => {
    await nextTick()

    const split = new SplitText(quoteRef.value, { type: 'words, chars' })

    gsap.from(split.chars, {
        opacity: 0.45,
        stagger: 0.03,
        duration: 0.6,
        ease: 'power2.out',
        scrollTrigger: {
            trigger: quoteRef.value,
            start: 'top 80%',
            end: 'bottom 60%',
            scrub: 1,
        },
    })
})
</script>

<template>
    <div class="block__quote quote">
        <div class="container">
            <div class="quote__inner">
                <q ref="quoteRef">
                    Hey! Ik ben Jirzy, een gepassioneerde full-stack developer.
                    Met ruim een jaar ervaring heb ik voor diverse klanten en bedrijven
                    op maat gemaakte websites ontwikkeld.
                </q>
            </div>
        </div>
    </div>
</template>
