<template>
<v-app >
  <app-header ></app-header>
  <router-view />
</v-app>
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