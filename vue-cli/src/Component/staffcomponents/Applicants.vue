<template>
  <v-container fluid style="margin: 0px; padding: 0px; width: 100%; height: 90vh">
    <v-col>
      <div class="action-block">Filter area</div>
      <div class="applicant-list">
        <v-list shaped>
          <v-list-item-group>
            <v-list-item
              v-for="i in 100"
              :key="i"
              @click="applicantInfor = i"
              v-slot:default="{ active, toggle }"
            >
              <template :color="active ? undefined : 'grey lighten-1'" @click="toggle">
                <v-list-item-action>
                  <v-checkbox color="primary"></v-checkbox>
                </v-list-item-action>

                <v-list-item-content>
                  <v-list-item-title>Applicant {{i}}</v-list-item-title>
                  <v-list-item-subtitle>Applicants Infor</v-list-item-subtitle>
                </v-list-item-content>

                <v-list-item-content>
                  <v-list-item-title>Status:</v-list-item-title>
                  <v-list-item-subtitle>Not Approved</v-list-item-subtitle>
                </v-list-item-content>
              </template>
            </v-list-item>
          </v-list-item-group>
        </v-list>
      </div>
    </v-col>
    <v-divider></v-divider>
    <v-col>
      <div class="applicant-view">
        <div class="view-content">This is the view of applicant with ID {{applicantInfor}}</div>
      </div>
      <div class="action-block">
        <v-card flat class="py-12">
          <v-card-text>
            <v-row>
              <v-btn-toggle v-model="toggle_exclusive" rounded>
                <v-btn>
                  Approve
                </v-btn>
                <v-btn>
                  Reject
                </v-btn>
                <v-btn>
                  Pending
                </v-btn>
              </v-btn-toggle>
            </v-row>
          </v-card-text>
        </v-card>
      </div>
    </v-col>
  </v-container>
</template>
<script>
export default {
  data: function() {
    return {
      applicantInfor: null
    };
  }
};
</script>
<style scoped>
.col {
  float: left;
  width: 50%;
  height: 100%;
}
.applicant-list {
  width: auto;
  height: 92%;
  overflow-y: scroll;
  background-color: rgb(255, 255, 255);
}
.applicant-view {
  width: auto;
  height: 92%;
  overflow-y: scroll;
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