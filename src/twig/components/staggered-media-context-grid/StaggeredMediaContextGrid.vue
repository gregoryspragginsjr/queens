<template>
  <div
    ref="target"
    class="staggered-media-context-grid--animated"
  >
    <slot />
  </div>
</template>

<script>
import gsap from 'gsap';
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollTrigger);

export default {
  mounted() {
    this.animate();
  },
  methods: {
    animate() {
      const animationTarget = this.$refs.target;
      const shades = animationTarget.querySelectorAll('.staggered-media-context-grid__shade');

      console.log(shades);

      gsap.to(
        shades,
        {
          scrollTrigger: {
            trigger: shades[0],
            toggleActions: 'restart none none reverse',
            start: 'top 70%',
            end: 'top 30%',
            scrub: 0.5,
          },
          width: 0,
          ease: 'power3.easeInOut',
          duration: 0.4,
        }
      )
    }
  }
}
</script>