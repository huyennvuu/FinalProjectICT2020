<template>
<div>
    <app-header></app-header>
    <app-server-details></app-server-details>
    <app-footer></app-footer>
</div>
</template>

<script>
import Footer from './Component/Shared/Footer.vue';
import Header from './Component/Shared/Header.vue';
import Server from './Component/Server/Servers.vue';
import ServerDetails from './Component/Server/ServerDetails.vue';
export default {
    components: {
        'app-footer': Footer,
        'app-header': Header,
        'app-server': Server,
        'app-server-details': ServerDetails
    }
}
</script>

<style>
</style>
