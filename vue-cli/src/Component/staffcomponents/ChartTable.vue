<template>
<v-row>
<v-col cols="12" md="6"><PieChart /></v-col>
      <v-col cols="12" md="6" class= 'd-flex align-center justify-center'> 
        <v-container>
        <v-simple-table height="25%">
    <template v-slot:default>
      <thead>
        <tr>
          <th class="text-left">Applicant Status</th>
          <th class="text-center">Total</th>
          <th class="text-right">Percentage</th>
        </tr>
      </thead>
      <tbody >
        <tr v-for="item in applicantData" :key="item.status">
          <td class="text-left">{{ item.status }}</td>
          <td class="text-center">{{ item.total }}</td>
          <td class="text-right">{{ item.percen }}</td>
        </tr>
      </tbody>
    </template>
  </v-simple-table>
        </v-container>
      </v-col>
</v-row>
</template>

<script>
import PieChart from "./PieChart.vue";

  export default {
    components: {
    PieChart
  },
    data () {
      return {
        applicantData: [
          {
            status: 'Approved',
            total: 100,
            percen: '43.47 %',
          },
          {
            status: 'Pending',
            total: 80,
            percen: '37.78 %',
          },
          {
            status: 'Rejected',
            total: 50,
            percen: '21.73 %',
          },
        ],
      }
    },
  }
</script>
<style scoped>
th {
  font-size: 20px;
}
</style>