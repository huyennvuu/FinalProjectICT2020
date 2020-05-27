<template>
<div >
  <app-header ></app-header>
  <router-view />
</div>
</template>

<script> 
import Header from './Component/Header.vue'

export default {
  name: 'app',
  components: {
    'app-header': Header
  }
}
</script>

<style  >
</style>