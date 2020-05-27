<template>
<div class = "container">
    <div class ="col">
        <div class = "filter-block">Filter area</div>
       <div class= "applicant-list"> 
           <div class = "applicant" v-for="i in 100" @click="applicantInfor = i" >
               <span>Applicant list view | {{i}}</span>
               </div> 
           </div>
    </div>
    <div class ="col">
       <div class= "applicant-view"> 
           {{applicantInfor}}
        </div>
        <div class = "filter-block">Filter area</div>
    </div>
</div>
</template>
<script>
export default {
    data: function(){
        return {
            applicantInfor: null
        }
}
}
</script>
<style scoped>
.container{
    width: auto;
    height: 80vh;
}
.col {
    float: left;
    width: 50%;
    height: 100%;
}
.applicant-list {
    width: auto;
    height: 92%;
    overflow-y: scroll ;
    background-color: rgb(255, 255, 255);
}
.applicant-view {
    width: auto;
    height: 92%;
    overflow-y: scroll ;
    background-color: rgb(175, 210, 255);
}
.filter-block {
    position: sticky;
    width: 100%;
    height: 8%;
    background-color: blanchedalmond;
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