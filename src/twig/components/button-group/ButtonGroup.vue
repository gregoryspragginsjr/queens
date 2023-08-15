<template>
  <div
    ref="target"
    class="button-group--animated"
  >
    <slot />
  </div>
</template>

<script>
import gsap from 'gsap';
import { ScrollTrigger } from "gsap/ScrollTrigger";
import Letterize from 'letterizejs';

gsap.registerPlugin(ScrollTrigger);

export default {
  mounted() {
    this.animate();
  },
  methods: {
    animate() {
      const animationTarget = this.$refs.target;
      const buttons = animationTarget.querySelectorAll('a');

      if (buttons) {
        gsap.to(
          buttons,
          {
            scrollTrigger: {
              trigger: animationTarget,
              toggleActions: 'restart none none reverse',
              start: 'top 80%',
            },
            opacity: 1,
            x: 0,
            ease: 'power3.easeOut',
            duration: 0.2,
            stagger: 0.2,
          }
        )
      }
    }
  }
}
</script>

<style lang="scss">
.button-group {
  &--animated {
    a {
      opacity: 0;
      transform: translateX(20px);
    }
  }
}
</style>