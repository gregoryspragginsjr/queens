<template>
  <div
    ref="target"
    class="context-section--animated"
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
      const icons = animationTarget.querySelectorAll('.context-section__icons svg');

      if (icons) {
        gsap.fromTo(
          icons,
          {
            rotationY: 720,
            y: 30,
            opacity: 0,
          },
          {
            scrollTrigger: {
              trigger: icons[0],
              toggleActions: 'restart none none reverse',
              start: 'top 80%',
            },
            rotationY: 0,
            y: 0,
            opacity: 1,
            ease: 'power4.easeIn',
            duration: 1.6,
          }
        )
      }
    }
  }
}
</script>
