<template>
<div >
  <app-header ></app-header>
  <router-view />
</div>
</template>

<script> 
import SignIn from './views/SignIn.vue'
import Header from './Component/Header.vue'

export default {
  name: 'app',
  components: {
    'app-sign-in': SignIn,
    'app-header': Header
  }
}
</script>

<style scoped >
</style>