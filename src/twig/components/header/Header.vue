<template>
  <header>
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
  export default {
    data() {
      return {
        active: false,
        drawerActive: false,
        searchActive: false,
        activeChild: undefined,
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
      }
    }
  }
</script>