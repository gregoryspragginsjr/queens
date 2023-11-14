<template>
  <nav
    :class="{'sidebar-nav--active' : active}"
    @click="active = !active"
  >
    <slot
    />
  </nav>
</template>

<script>

export default {
  data() {
    return {
      active: false,
    }
  }
}
</script>