<template>
<div class = 'serverdetails'>
    <p> Server Status: {{results()}}</p>
    <hr>
    <button @click="status = !status">Change Status</button>
</div>
</template>
<script>
export default {
    data: function(){
        return {
            status: true
        }
    },
    methods: {
        results: function(){
            return !(this.status) ? 'Critical' : 'Normal'
        }
    }
}
</script>
<style scoped>
.serverdetails {
    position:absolute;
    left: 0;
    top: 100px;
    width: 100%;
    background-color: rgb(255, 255, 255);
    padding: 20px 0;
}
</style>

</style>