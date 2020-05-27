<template>
<div class = "container">
    
    <div class ="col">
        <div class = "action-block">Filter area</div>
       <div class= "applicant-list"> 
           <div class = "applicant" v-for="i in 100" @click="applicantInfor = i">
               <div class="checkboxContainer">
                   <input class = "idCheckbox" type="checkbox"/>
               </div>
               <div class="infoApp">
                    <span>Applicant list view | {{i}}</span>
                    <p>20-1-2020 | Female | ICT</p>
               </div>
           </div>
        </div>
    </div>

    <div class ="col">
       <div class= "applicant-view"> 
           <div class="view-content">
           This is the view of applicant with ID {{applicantInfor}}
           </div>
        </div>
        <div class = "action-block">
        </div>
        
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
.applicant {
    font-family: Tahoma;
    box-sizing: border-box;
    height: 10%;
    display: table;
    width: 100%;
    border-bottom: 0.5px solid rgb(66, 66, 66);
}
.infoApp {
    padding: 0.5vh 0;
}
span {
  display: table-row;
  font-size: 2vh;
}
p {
  display: table-row;
  font-size: 1.5vh;
}

.applicant:hover {
  background-color: rgb(224, 224, 224);
}

.checkboxContainer {
    display: table-cell;
    padding: 1vh 0;
}
.idCheckbox {
}


.applicant-view {
    width: auto;
    height: 92%;
    overflow-y: scroll ;
    background-color: rgb(175, 210, 255);
}
.view-content {
    padding: 3%;
}
.action-block {
    position: sticky;
    width: 100%;
    height: 8%;
    background-color: blanchedalmond;
}
</style>