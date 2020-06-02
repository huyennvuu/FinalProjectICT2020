<template>
<v-container fluid>
    <div class = "donutChart">Chart area</div>
    <hr>
    <div class = "list">
        <v-list shaped>
          <v-list-item-group>
            <v-list-item
              v-for="i in 10"
              :key="i"
            >
              <template>
                <v-list-item-content>
                  <v-list-item-title>Applicant Name: {{i}}</v-list-item-title>
                  <v-list-item-subtitle
                  >Department: Information Communication Technology | Score: 8.0 | Gender: Female</v-list-item-subtitle>
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

</style>