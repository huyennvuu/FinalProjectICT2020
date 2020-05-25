<template>
  <div id="app">
    <app-sign-in></app-sign-in>
  </div>
</template>

<script>
import SignIn from './Component/ServerDetails.vue'

export default {
  name: 'app',
  components: {
    'app-sign-in': SignIn
  }
}
</script>

<style >
body {
    margin: 0;
    padding: 0;
  }

  #app {
    font-family: Tahoma;
    font-size: 1.6rem;
    color: #222;
    background-color: #092525;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
  }
</style>