<template>
  <header :class="{'header--active' : lightMode}" ref="header">
    <slot
      :active="active"
      :drawerActive="drawerActive"
      :searchActive="searchActive"
      :activeChild="activeChild"
      :toggleDrawer="toggleDrawer"
      :toggleSearch="toggleSearch"
      :toggleActiveChild="toggleActiveChild"
    />
  </header>
</template>

<script>
  import gsap from 'gsap';
  import { ScrollTrigger } from "gsap/ScrollTrigger";

  gsap.registerPlugin(ScrollTrigger);

  export default {
    data() {
      return {
        lightMode: false,
        drawerActive: false,
        searchActive: false,
        activeChild: undefined,
      }
    },
    props: {
      active: {
        type: Boolean,
        required: false,
        default: false,
      }
    },
    mounted() {
      if (this.active) {
        this.lightMode = true;

        setTimeout(() => {
          this.animate();
        }, 1000);
      }
    },
    methods: {
      toggleDrawer() {
        this.drawerActive = !this.drawerActive;
        this.activeChild = undefined;
      },
      toggleSearch() {
        this.searchActive = !this.searchActive;
      },
      toggleActiveChild(child, e) {

        if (this.activeChild == child) {
          this.activeChild = undefined;
        } else {
          this.activeChild = child;
        }
      },
      animate() {
        const component = this;
        const animationTarget = this.$refs.header;

        gsap.to(
          animationTarget,
          {
            scrollTrigger: {
              trigger: animationTarget,
              start: 'top top',
              onEnter: () => {
                component.lightMode = false;
              },
              onEnterBack: () => {
                component.lightMode = true;
              }
            }
          },
        )
      },
    }
  }
</script>