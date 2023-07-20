<template>
  <header>
    <slot
      :active="active"
      :drawerActive="drawerActive"
      :activeChild="activeChild"
      :toggleDrawer="toggleDrawer"
      :toggleActiveChild="toggleActiveChild"
    />
  </header>
</template>

<script>
  export default {
    data() {
      return {
        active: false,
        drawerActive: false,
        activeChild: undefined,
      }
    },
    methods: {
      toggleDrawer() {
        this.drawerActive = !this.drawerActive;
        this.activeChild = undefined;
      },
      toggleActiveChild(child, e) {

        if (this.activeChild == child) {
          this.activeChild = undefined;
        } else {
          this.activeChild = child;
        }
      }
    }
  }
</script>