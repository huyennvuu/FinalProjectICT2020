<template>
    <div class = "header" > <button @click="navToLogin"> USTH OMS</button>
    </div>
</template>
<script>
export default {
    methods: {
        navToLogin() {
            this.$router.push('/');
        }
    }
}
</script>
<style scoped>
.header {
    font-size: 20px;
    position:absolute;
    left: 0;
    top: 0;
    width: 100%;
    background-color: cornflowerblue;
    color: white;
    padding: 20px 0;
    padding-left: 10px;
}
</style>