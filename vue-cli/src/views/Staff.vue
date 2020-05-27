<template>
    <div>
        <ul>
            <li><a :class="{active: selectedComponents === 'staffHome'}" @click="selectedComponents = 'staffHome'">Home</a></li>
            <li><a :class="{active: selectedComponents === 'applicantsList'}" @click="selectedComponents = 'applicantsList'">Applicants</a></li>
            <li><a :class="{active: selectedComponents === 'waveEnroll'}" @click="selectedComponents = 'waveEnroll'">Wave</a></li>
            <li><a :class="{active: selectedComponents === 'interviewJury'}" @click="selectedComponents = 'interviewJury'">Interview Jury</a></li>
            <li><a :class="{active: selectedComponents === 'staffAccounts'}" @click="selectedComponents = 'staffAccount'">Account</a></li>
        </ul>
        <div>
            <keep-alive>
            <component :is = "selectedComponents"  ></component>
            </keep-alive>
        </div>
        
    </div>
</template>
<script>
import Home from '../Component/staffcomponents/HomeStaff.vue'
import Applicants from '../Component/staffcomponents/Applicants.vue'
import Wave from '../Component/staffcomponents/Wave.vue'
import InterviewJury from '../Component/staffcomponents/InterviewJury.vue'
import Account from '../Component/staffcomponents/Accounts.vue'
export default {
    data: function(){
        return {
            selectedComponents: 'staffHome',
            active: null
        }
    },
    components: {
        staffHome: Home,
        applicantsList: Applicants,
        waveEnroll: Wave,
        interviewJury: InterviewJury,
        staffAccount: Account
    }
}
</script>
<style scoped>
ul {
  font-family: Tahoma;
  font-size: 1.2vw;
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: rgb(190, 190, 190);
  width: auto
}

li {
  box-sizing: border-box;
  float: left;
  border-right: 1px solid rgb(66, 66, 66);
  width: 20%;
}

li a {
  display: block;
  color: rgb(80, 80, 80);
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #111;
  color: white ;
}

.active {
  background-color: rgb(255, 255, 255);
  color: black
}
</style>