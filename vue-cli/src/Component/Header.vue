<template>
    <div class = "header" > <h1 @click="navToLogin"> USTH OMS</h1>
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
    font-family: Tahoma;
    font-size: 1.6vw;
    left: 0;
    top: 0;
    width: auto;
    background-color: #004eb3;
    color: white;
    padding: 10px 0;
    padding-left: 20px;
}
</style>