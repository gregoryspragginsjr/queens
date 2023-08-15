<template>
  <article
    ref="target"
    class="article--animated"
  >
    <slot />
  </article>
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
      const image = animationTarget.querySelector('.article__image');

      if (image) {
        gsap.to(
          image,
          {
            scrollTrigger: {
              trigger: image,
              toggleActions: 'restart none none reverse',
              scrub: 1,
            },
            scale: 1,
            ease: 'power4.easeOut',
            duration: 0.6,
          }
        )
      }
    }
  }
}
</script>

<style lang="scss">
.article {
  &__image {
    .article--animated & {
      transform: scale(0.90);
    }
  }
}
</style>