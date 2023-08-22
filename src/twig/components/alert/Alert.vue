<template>
  <div :class="{'alert--active': active}">
    <slot
      :active="active"
      :toggleActive="toggleActive"
    />
  </div>
</template>

<script>
export default {
  data() {
    return {
      active: true,
    }
  },
  created() {
    if (sessionStorage.getItem('read')) {
      this.active = false;
    }
  },
  methods: {
    toggleActive() {
      this.active = !this.active;

      sessionStorage.setItem('read', true);
    }
  }
}
</script>