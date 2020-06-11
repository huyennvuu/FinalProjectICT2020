<template>
  <v-container fluid>
      <ChartTable />
    <hr />
    <div class="list">
      <v-list shaped>
        <v-list-item-group>
          <v-list-item v-for="i in userData" :key="i.id">
            <template>
              <v-list-item-content>
                <v-list-item-title>{{i.full_name}}</v-list-item-title>
                <v-list-item-subtitle>
                  Program: {{i.name}} | Score: {{i.gpa_mark_10}} | Gender: {{i.gender}}
                </v-list-item-subtitle>
              </v-list-item-content>
              <div>
                <v-list-item-title>Status: {{i.form_status}}</v-list-item-title>
              </div>
            </template>
          </v-list-item>
        </v-list-item-group>
      </v-list>
    </div>
  </v-container>
</template>
<script>
import axios from "axios";
// import PieChart from "./PieChart.vue";
import ChartTable from "./ChartTable.vue";
export default {
  components: {
    ChartTable,
  },
  props: ['user']
  ,
  data: () => {
    return {
      userData: [],
      }
  },
   mounted: function(){
    this.getAllApplicants()
  },
  methods: {
    getAllApplicants: function(){
      axios
      .get("http://192.168.64.2/php/process.php?action=initialLoad")
      .then(response => {
        if (response.data.error) {
          alert(response.data.message);
        } else {
          this.userData = response.data.user;
        }
      });
    }
  }
};
</script>

<style scoped>
.donutChart {
  height: 30vh;
  width: auto;
  background-color: rgb(255, 255, 255);
}
.list {
  height: 40vh;
  width: auto;
  background-color: rgb(255, 255, 255);
  overflow-y: scroll;
}
</style>