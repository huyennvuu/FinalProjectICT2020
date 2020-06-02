<template>
  <v-container fluid style="margin: 0px; padding: 0px; width: 100%; height: 80vh">
    <v-dialog v-model="dialog2" max-width="500px">
      <v-card>
        <v-card-title>Dialog 2</v-card-title>
        <v-card-text>
          <v-btn color="primary" dark @click="dialog3 = !dialog3">Open Dialog 3</v-btn>
          <v-select label="A Select List" item-value="text"></v-select>
        </v-card-text>
        <v-card-actions>
          <v-btn color="primary" text @click="dialog2 = false">Close</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
    <v-col>
      <v-toolbar dark color="blue darken-3">
        <v-icon>mdi-magnify</v-icon>
        <v-text-field clearable flat solo-inverted hide-details label="Search"></v-text-field>

        <v-spacer></v-spacer>
        <v-btn color="dark" class="ma-2" light @click="dialog2 = true" laber="Filter">
          <v-icon>mdi-format-list-bulleted-square</v-icon>
        </v-btn>
      </v-toolbar>

      <div class="applicant-list">
        <v-list shaped>
          <v-list-item-group>
            <v-list-item
              v-for="i in 100"
              :key="i"
              @click="applicantInfor = i"
              v-slot:default="{ active, toggle }"
            >
              <template :color="active ? undefined : 'grey darken-3'" @click="toggle">
                <v-list-item-content>
                  <v-list-item-title>Applicant Name: {{i}}</v-list-item-title>
                  <v-list-item-subtitle
                    wrap
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
    </v-col>

    <v-col>
      <div class="applicant-view">
          <iframe src="./file-test/test.pdf" style="width:100%; height:100%"></iframe>
      </div>
      <v-card flat>
        <v-card-text>
          <v-row>
            <div class="my-2" left>
              <v-btn small color="success" dark>Approve</v-btn>
              <v-btn small color="error" dark>Reject</v-btn>
              <v-btn small color="warning" dark>Pending</v-btn>
            </div>
            <v-spacer></v-spacer>
            <v-btn small color="warning" dark>Export PDF</v-btn>
          </v-row>
        </v-card-text>
      </v-card>
    </v-col>
  </v-container>
</template>
<script>
export default {
  data: function() {
    return {
      applicantInfor: null,
      dialog2: false
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
  background-color: rgb(221, 221, 221);
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