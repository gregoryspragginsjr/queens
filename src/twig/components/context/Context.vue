<template>
  <div
    ref="target"
    class="context--animated"
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
      const subheading = animationTarget.querySelector('.context__subheading');
      const heading = animationTarget.querySelector('.context__heading div');
      const squiggle = animationTarget.querySelector('.squiggle');
      const icon = animationTarget.querySelector('.context__icon');
      const paragraphs = animationTarget.querySelectorAll('p');

      let headingText;
      let headingWords = [];
      let animatedWords = [];

      if (subheading) {
        animatedWords.push(subheading);
      }

      if (heading) {
        headingText = heading.innerHTML.split(' ');
        heading.innerHTML = '';

        headingText.forEach((word) => {
          let wordWrap = document.createElement('span');
          wordWrap.innerHTML = word;

          heading.append(wordWrap);
          heading.append(' ');
        });

        headingWords = heading.querySelectorAll('span');
        headingWords = [].slice.call(headingWords);

        animatedWords = animatedWords.concat(headingWords);
      }

      if (squiggle) {
        animatedWords.push(squiggle);
      }

      if (icon) {
        gsap.fromTo(
          icon,
          {
            rotationY: 720,
            y: 20,
            opacity: 0,
          },
          {
            scrollTrigger: {
              trigger: icon,
              toggleActions: 'restart none none reverse',
              start: 'top 80%',
            },
            rotationY: 0,
            y: 0,
            opacity: 1,
            ease: 'power4.easeOut',
            duration: 2,
          }
        )
      }

      gsap.to(
        animatedWords,
        {
          scrollTrigger: {
            trigger: heading,
            toggleActions: 'restart none none reverse',
            start: 'top 80%',
          },
          opacity: 1,
          y: 0,
          ease: 'power3.easeOut',
          duration: 0.4,
          stagger: 0.1,
        }
      )

      if (paragraphs) {
        gsap.to(
          paragraphs,
          {
            scrollTrigger: {
              trigger: paragraphs[0],
              toggleActions: 'restart none none reverse',
              start: 'top 75%',
            },
            opacity: 1,
            ease: 'power3.easeOut',
            duration: 0.6,
            stagger: 0.2,
          }
        )
      }
    }
  }
}
</script>

<style lang="scss">
.context {
  &--animated {
    p {
      opacity: 0;
    }

    .squiggle {
      display: inline-block;
      opacity: 0;
      transform: translateY(20px);
    }
  }
  
  &__heading span,
  &__subheading {
    .context--animated & {
      display: inline-block;
      opacity: 0;
      transform: translateY(20px);
    }
  }
}
</style>