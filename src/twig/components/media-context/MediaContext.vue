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

<style lang="scss">
.media-context {
  &--animated {
    img,
    image {
      opacity: 0;
      transform: rotateX(15deg) rotateY(-30deg) translateZ(0) scale(0.95);
      transform-style: preserve-3d;
    }

    &.media-context--reverse img,
    &.media-context--reverse image {
      transform: rotateX(15deg) rotateY(30deg) translateZ(0) scale(0.95);
    }

    svg {
      overflow: visible;
    }

    .video img {
      opacity: 1;
      transform: none;
    }
  }

  &__image {
    .media-context--animated & {
      perspective: 100vw;
      perspective-origin: 50% var(--perspective-origin-y);
    }
  }
}
</style>