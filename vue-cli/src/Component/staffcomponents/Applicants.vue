<template>
  <v-container flat fluid style="margin: 0px; padding: 0px; width: 100%; height: 80vh">
    <v-dialog v-model="dialog2" max-width="500px">
      <v-card>
        <v-card-title>Filter</v-card-title>
        <v-card-text>
          <v-form>
            <v-select :items="wave" label="Wave"></v-select>
            <v-select :items="department" label="Department"></v-select>
            <v-switch v-model="switch1" :label="`Award and Distinctions`"></v-switch>
            <v-text-field type="number" label="Average Score" max=10 step=0.1></v-text-field>
          </v-form>
        </v-card-text>
        <v-card-actions>
          <v-btn color="primary" class="text-center" text @click="dialog2 = false">Apply Filter</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
    <v-col>
      <v-toolbar dark color="blue darken-3">
        <v-checkbox label="Select All" hide-details></v-checkbox>
        <v-spacer></v-spacer>
        <!-- <v-icon>mdi-magnify</v-icon> -->
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
              v-for="(applicant,index) in applicants"
              :key="index"
              @click="selectApplicant(index), selectedApplicant = index"
              v-slot:default="{ active, toggle }"
            >
              <template :color="active ? undefined : 'grey darken-3'" @click="toggle;">
                <div>
                  <v-checkbox></v-checkbox>
                </div>
                <v-list-item-content>
                  <v-list-item-title>{{applicant.full_name}}</v-list-item-title>
                  <v-list-item-subtitle class="wrap-text">
                    Avg Score: {{applicant.gpa_mark_10}}
                    <v-divider vertical></v-divider>
                    Department: {{applicant.name}}
                    <v-divider vertical></v-divider>
                    Gender: {{applicant.gender}}
                  </v-list-item-subtitle>
                  <v-divider vertical></v-divider>
                </v-list-item-content>
                <div>
                  <v-list-item-title>Status: {{applicant.form_status}}</v-list-item-title>
                </div>
              </template>
            </v-list-item>
          </v-list-item-group>
        </v-list>
      </div>
    </v-col>

    <v-col>
      <div class="applicant-view">
        <iframe :src=filePath style="width:100%; height:100%"></iframe>
        <!-- <embed :src=filePath type=”application/pdf” width=”100%” height=”100%”> -->
        <!-- <object data=filePath  type=”application/pdf” width=”100%” height=”100%” /> -->
      </div>
      <v-container >
              <v-btn small  color="success" dark @click="changeStatus(selectedApplicant,'Approved')" >Approve</v-btn>
              <v-btn small  color="error" dark @click="changeStatus(selectedApplicant,'Rejected')">Reject</v-btn>
              <v-btn small  color="warning" dark @click="changeStatus(selectedApplicant,'Pending')">Pending</v-btn>
      </v-container>
    </v-col>
  </v-container>
</template>
<script>
import axios from "axios";
export default {
  data: function() {
    return {
      dialog2: false,
      department: ["All", "ICT", "WEO", "NANO", "BP"],
      wave: [1,2,3,4],
      switch1: false,
      mark: 5.5,
      filePath: '',
      selectedApplicant: null,
      applicants: [],
      };
  },
  mounted: function(){
    this.getAllApplicant()
  },
  methods: {
    getAllApplicant: function(){
      axios
      .get("http://192.168.64.2/php/process.php?action=initialLoad")
      .then(response => {
        if (response.data.error) {
          alert(response.data.message);
        } else {
          this.applicants = response.data.user;
        }
      });
    },
    selectApplicant: function(id) {
      var count = id+1
      this.filePath = './file-test/test'+count+'.pdf';
    },
    changeStatus: function(id,stt){
      console.log(id)
      this.applicants[id].form_status = stt
      var sent_data = new FormData()
      sent_data.append("id",this.applicants[id].id)
      sent_data.append("form_status",stt)
      axios
        .post("http://192.168.64.2/php/process.php?action=update_form_status", sent_data)
        .then(function(response) {
          if (response.data.error) {
            console.log(response.data.message);
          } else {
            console.log(response.data.message)
          }
        });
    }
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
.wrap-text {
  -webkit-line-clamp: unset !important;
}
</style>
