import Vue from 'vue';
import VueRouter from 'vue-router';
import SignIn from '../views/SignIn.vue';
import Staff from '../views/Staff.vue';

Vue.use(VueRouter);

const routes = [
    {path: '/login', name: 'homepage', component: SignIn},
    {path: '/staff', name: 'staffpage', component: Staff},
]
const router = new VueRouter({
    mode: 'history',
    base: process.env.BASE_URL,
    routes
})
export default router