<template>
  <v-container fluid>
    <div class="donutChart">Chart area</div>
    <hr />
    <div class="list">
      <v-list shaped>
        <v-list-item-group>
          <v-list-item v-for="i in userData" :key="i.id">
            <template>
              <v-list-item-content>
                <v-list-item-title>{{i.full_name}}</v-list-item-title>
                <v-list-item-subtitle>1<sup>st</sup> Program: {{i.name}} | Score: {{i.gpa_mark_10}} | Gender: {{i.gender}}</v-list-item-subtitle>
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
export default {
  data: () => {
    return {
      userData: [],
      datasets: [
        {
          data: [10, 20, 30]
        }
      ],

      // These labels appear in the legend and in the tooltips when hovering different arcs
      labels: ["Red", "Yellow", "Blue"]
    };
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
  height: 40vh;
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