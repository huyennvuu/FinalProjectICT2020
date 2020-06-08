<template>
  <v-container fluid>
    <v-row>
      <v-col cols="12" md="5"><PieChart/></v-col>
      <v-col cols="12" md="7"> information</v-col>
    </v-row>
      
    <hr />
    <div class="list">
      <v-list shaped>
        <v-list-item-group>
          <v-list-item v-for="i in userData" :key="i.id">
            <template>
              <v-list-item-content>
                <v-list-item-title>{{i.full_name}}</v-list-item-title>
                <v-list-item-subtitle>
                  1
                  <sup>st</sup>
                  Program: {{i.name}} | Score: {{i.gpa_mark_10}} | Gender: {{i.gender}}
                </v-list-item-subtitle>
              </v-list-item-content>
              <div>
                <v-list-item-title>Status:</v-list-item-title>
                <v-chip color="warning" text-color="white" x-small>Pending</v-chip>
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
import PieChart from "./PieChart.vue";
export default {
  components: {
    PieChart,
  },
  data: () => {
    return {
      userData: [],
      }
  },
  created: function() {
    axios
      .get("http://192.168.64.2/php/process.php?action=initialLoad")
      .then(response => {
        if (response.data.error) {
          alert(response.data.message);
        } else {
          this.userData = response.data.user;
        }
      });
  },
  methods: {}
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