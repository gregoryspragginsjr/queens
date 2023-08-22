<template>
  <div
    ref="target"
    class="page-header--animated"
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
      const shade  = animationTarget.querySelector('.page-header__shade');
      const heading = animationTarget.querySelector('.page-header h1 span');
      const squiggle = animationTarget.querySelector('.squiggle');

      let subheading1 = animationTarget.querySelector('.page-header__small-text div:nth-child(1)');
      let subheading2 = animationTarget.querySelector('.page-header__small-text div:nth-child(2)');

      subheading1 = new Letterize({
        targets: subheading1,
      });

      subheading2 = new Letterize({
        targets: subheading2,
      });

      gsap.to(
        animationTarget.querySelectorAll('.page-header__small-text div span'),
        {
          scrollTrigger: {
            trigger: animationTarget.querySelectorAll('.page-header__small-text div span')[0],
            toggleActions: 'restart none restart none',
          },
          opacity: 1,
          stagger: 0.06,
          duration: 0,
        }
      )

      gsap.fromTo(
        shade,
        {
          right: 'auto',
          left: 0,
          width: 0,
        },
        {
          scrollTrigger: {
            trigger: heading,
            toggleActions: 'restart none restart none',
          },
          left: 0,
          right: 'auto',
          width: '100%',
          ease: 'power4.easeIn',
          duration: 0.4,
          onComplete: () => {
            gsap.fromTo(
              heading,
              {
                scrollTrigger: {
                  trigger: heading,
                  toggleActions: 'reset reset reset reset',
                },
                opacity: 0,
                duration: 0,
              },
              {
                opacity: 1,
                duration: 0,
              }
            );

            gsap.fromTo(
              shade,
              {
                width: '100%',
                right: 0,
                left: 'auto',
              },
              {
                width: '0',
                ease: 'power4.easeOut',
                duration: 0.4,
              }
            );

            gsap.fromTo(
              squiggle,
              {
                width: 0,
              },
              {
                scrollTrigger: {
                  trigger: squiggle,
                  toggleActions: 'restart none reset none',
                },
                width: '120px',
                ease: 'power4.easeIn',
                duration: 1,
              }
            )
          }
        }
      )
    }
  }
}
</script>
