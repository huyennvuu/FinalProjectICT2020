<template>
    <div>
        <div style="height: 50vh; overflow-y: scroll ;">
             <div v-for="id in waveID" :key ="id" class="wave-container">
            <div class="infor-session">
                <div class="wave-name">
                Wave Name {{id}}
                </div>
                <div class="wave-infor"> Wave Infor</div>
            </div>
            <div class="button-session">
                <button>Edit</button> 
                <button @click="removeElement(id); count--">Delete</button> 
            </div>

        </div>
        </div>
       
        <div style="display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 20vh;">
                    <input type="text" placeholder="New Wave Name" v-model="newWave">
                    <button id="addWave" @click="waveID.push(newWave)"> Add new wave</button>
        </div>
        
    </div>
</template>
<script>
export default {
    data() {
       return {
            waveID: [1,2,3],
            count: 3,
            newWave: undefined,
       } 
    },
    methods: {
        removeElement: function (index) {
                for(var i =0; i < this.waveID.length; i++){
                    if(this.waveID[i] == index)
                     this.waveID.splice(i,1)
                }
        }
    }
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