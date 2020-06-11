<template>
    <v-simple-table>
    <template v-slot:default>
      <thead>
        <tr>
          <th class="text-left">Applicant Status</th>
          <th class="text-left">Total</th>
          <th class="text-left">Percentage</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="item in applicantData" :key="item.status">
          <td>{{ item.status }}</td>
          <td>{{ item.total }}</td>
          <td>{{ item.percen }}</td>
        </tr>
      </tbody>
    </template>
  </v-simple-table>
</template>

<script>
  export default {
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