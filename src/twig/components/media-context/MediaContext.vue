<template>
  <div
    ref="target"
    class="media-context--animated"
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
      const image = animationTarget.querySelectorAll('img, image');

      if (image) {
        gsap.to(
          image,
          {
            scrollTrigger: {
              trigger: animationTarget,
              toggleActions: 'restart none none reverse',
              start: 'top 70%',
              end: 'bottom 90%',
              scrub: 1,
            },
            transform: 'rotateX(0deg) rotateY(0deg) translateZ(0) scale(1)',
            opacity: 1,
            ease: 'power4.easeOut',
            duration: 0.6,
          }
        )
      }
    }
  }
}
</script>
