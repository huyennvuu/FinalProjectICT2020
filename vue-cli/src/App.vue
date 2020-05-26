<template>
<div >
  <app-header class = "header"></app-header>
  <router-view class = "signIn"/>
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
body {
    margin: 0;
    padding: 0;
  }
  .header{
    height: 10vh;
    justify-content: center;
  align-items: center;
  }
 .signIn{
  font-family: Tahoma;
  font-size: 1.6rem;
  color: #222;
  background-color: #eeeeee;
  height: 90vh;
  display:flex;
  justify-content: center;
  align-items: center;
}
</style>