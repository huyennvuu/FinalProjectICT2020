<template>
<v-container fluid>
    <div class = "donutChart">Chart area</div>
    <hr>
    <div class = "list">
        <div class = "applicant" v-for="i in 10" @click="applicantInfor = i">
               <div class="infoApp">
                    <span>Applicant list view | {{i}}</span>
                    <p>20-1-2020 | Female | ICT</p>
               </div>
               <div class="status-view">
                   Status: Not approved
                </div>
        </div>
    </div>
</v-container>
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
    font-family: Tahoma;
    box-sizing: border-box;
    height: 10%;
    display: table;
    width: 100%;
    border-bottom: 0.5px solid rgb(66, 66, 66);
}
.infoApp {
    width: 80%;
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
.status-view {
    display: table-cell;
    padding: 0.5vh 0;
    font-size: 1.5vh;
    width: 20%;
}
</style>