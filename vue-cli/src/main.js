import Vue from 'vue'
import router from './router/'
import App from './App.vue'
import vuetify from './plugins/vuetify'
import axios from 'axios'
new Vue({
  el: '#app',
  router,
  axios,
  vuetify,
  render: h => h(App)
})
