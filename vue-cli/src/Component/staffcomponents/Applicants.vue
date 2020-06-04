<template>
  <v-container fluid style="margin: 0px; padding: 0px; width: 100%; height: 80vh">
    <v-dialog v-model="dialog2" max-width="500px">
      <v-card>
        <v-card-title>Filter</v-card-title>
        <v-card-text>
          <v-form>
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
              v-for="applicant in applicants"
              :key="applicant.id"
              @click="selectApplicant(applicant.id)"
              v-slot:default="{ active, toggle }"
            >
              <template :color="active ? undefined : 'grey darken-3'" @click="toggle;">
                <div>
                  <v-checkbox></v-checkbox>
                </div>
                <v-list-item-content>
                  <v-list-item-title>Applicant Name: {{applicant.name}}</v-list-item-title>
                  <v-list-item-subtitle>
                    Gender: {{applicant.gender}}
                    <v-divider vertical></v-divider>
                    Department: {{applicant.department}}
                    <v-divider vertical></v-divider>
                    Score: {{applicant.score}}
                  </v-list-item-subtitle>
                  <v-divider vertical></v-divider>
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
        <p>This is the file {{filePath}}</p>
        <iframe :src=filePath style="width:100%; height:100%"></iframe>
      </div>
      <v-card flat>
        <v-card-text>
          <v-row>
            <div class="my-2" left>
              <v-btn small flat color="success" dark>Approve</v-btn>
              <v-btn small flat color="error" dark>Reject</v-btn>
              <v-btn small flat color="warning" dark>Pending</v-btn>
            </div>
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
      dialog2: false,
      department: ["All", "ICT", "WEO", "NANO", "BP"],
      switch1: false,
      mark: 5.5,
      filePath: '',
      applicants: [{id: 1, name: 'Do Ngoc', gender: 'Female',department: 'ICT', score: 7.0, status: 'Pending'},
                  {id: 2, name: 'Vu Huyen', gender: 'Female',department: 'ICT', score: 8.0,  status: 'Pending'},
                  {id: 4, name: 'Le Na', gender:'Female',department: 'BP', score: 9.0,  status: 'Pending'}]
    };
  },
  methods: {
    selectApplicant: function(id) {
      this.filePath = './file-test/test'+id+'.pdf';
      console.log(this.filePath)
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
</style>