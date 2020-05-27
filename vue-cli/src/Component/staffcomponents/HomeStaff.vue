<template>
<div class ="box">
    <div class = "donutChart">Chart area</div>
    <hr>
    <div class = "list">
        <div class= "applicant-list"> 
           <div class = "applicant" v-for="i in 10">
               <span>Applicant list view | {{i}}</span>
               </div> 
           </div>
    </div>
</div>
</template>
<script>

export default {
    
}
</script>
<style scoped>
.donutChart {
    height: 40vh;
    width: auto;
    background-color: rgb(255, 255, 255);
}
.list {
    height: 40vh;
    width: auto;
    background-color: rgb(255, 255, 255);
    overflow-y: scroll
}
.applicant {
    box-sizing: border-box;
    height: 10%;
    display: table;
    width: 100%;
    padding-left: 5px;
    border-bottom: 1px solid rgb(66, 66, 66);
}
span {
  display: table-cell;
  vertical-align: middle;
}
.applicant:hover {
  background-color: rgb(218, 218, 218);
}

</style>