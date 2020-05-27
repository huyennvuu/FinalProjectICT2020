<template>
    <div>
        <div style="height: 50vh">
             <div v-for="i in 3" class="wave-container">
            <div class="infor-session">
                <div class="wave-name">
                Wave Name {{i}}
                </div>
                <div class="wave-infor"> Wave Infor</div>
            </div>
            <div class="button-session">
                <button>Edit</button> 
                <button>Delete</button> 
            </div>

        </div>
        </div>
       
        <div style="display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 20vh;">
                    <button id="addWave"> Add new wave</button>
        </div>
        
    </div>
</template>
<script>
export default {
    
}
</script>
<style scoped>
.wave-container{
    display: table;
    width: 100%;
    height: 10%;
    font-family: Tahoma;
    box-sizing: border-box;
    border-bottom: 0.5px solid rgb(66, 66, 66);
    position: relative;
}
.infor-session {
    display: table-cell;
    padding: 1%;
}
.button-session {
    display: table-cell;
    float: right;
    padding-right: 1%;
    justify-content: center;
    align-items: center;
}
</style>