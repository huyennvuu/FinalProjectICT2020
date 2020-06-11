<template>
  <v-container fluid style="margin: 0px; padding: 0px; width: 100%; height: 80vh">
    <v-dialog v-model="formNew" max-width="500px">
      <v-card>
        <v-card-title class="align-center justify-center">Create a new wave</v-card-title>
        <v-card-text>
          <v-menu
            v-model="menu2"
            :close-on-content-click="false"
            :nudge-right="40"
            transition="scale-transition"
            offset-y
            min-width="290px"
          >
            <template v-slot:activator="{ on, attrs }">
              <v-text-field v-model="dateRangeText" label="Date range" readonly v-bind="attrs" v-on="on" prepend-icon="mdi-calendar" class="align-center justify-center"></v-text-field>
            </template>
            <v-date-picker v-model="dates" no-title range>
              <v-btn text color="primary" @click="menu2 = false">Ok</v-btn>
            </v-date-picker>
          </v-menu>
          
        </v-card-text>
        <v-card-actions class="align-center justify-center">
          <v-btn color="primary" class="text-center" text @click="addWave()">Add Wave</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>


    <v-dialog v-model="formEdit" max-width="500px">
      <v-card>
        <v-card-title class="align-center justify-center">Edit a new wave</v-card-title>
        <v-card-text>
          <v-menu
            v-model="menu2"
            :close-on-content-click="false"
            :nudge-right="40"
            transition="scale-transition"
            offset-y
            min-width="290px"
          >
            <template v-slot:activator="{ on, attrs }">
              <v-text-field v-model="dateEditRangeText" label="Date range" readonly v-bind="attrs" v-on="on" prepend-icon="mdi-calendar" class="align-center justify-center"></v-text-field>
            </template>
            <v-date-picker v-model="datesEdit" no-title range>
              <v-btn text color="primary" @click="menu2 = false">Ok</v-btn>
            </v-date-picker>
          </v-menu>
          
        </v-card-text>
        <v-card-actions class="align-center justify-center">
          <v-btn color="primary" class="text-center" text @click="updateEditWave()">Edit Wave</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>

    <div style="height: 50vh; overflow-y: scroll ;">
      <v-list>
        <v-list-item-group>
          <v-list-item v-for="wave in waves" :key="wave.id">
            <template>
              <v-list-item-content>
                <v-list-item-title>Wave Name: {{wave.id}}</v-list-item-title>
                <v-list-item-subtitle wrap>
                  Start Date: {{wave.date_start}}
                  <v-divider vertical></v-divider>
                  End Date: {{wave.date_end}}
                </v-list-item-subtitle>
              </v-list-item-content>
              <div class="my-2">
                <v-btn small outlined color="blue" dark @click="editWave(wave)">
                  <v-icon left>mdi-pencil</v-icon>Edit 
                </v-btn>
                <v-btn small color="error" dark @click="removeWave(wave.id)">
                  <v-icon left>mdi-delete</v-icon>Delete
                </v-btn>
              </div>
            </template>
          </v-list-item>
        </v-list-item-group>
      </v-list>
    </div>

    <div
      style="display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 10vh;"
    >
      <v-btn @click="formNew = !formNew" fab color="primary">
        <v-icon>mdi-plus</v-icon>
      </v-btn>
    </div>
  </v-container>
</template>
<script>
import axios from "axios";
export default {
  data() {
    return {
      waves: [],
      formNew: false,
      formEdit: false,
      menu2: false,
      dates: ['2019-09-10', '2019-09-20'],
      datesEdit: ['2019-09-10', '2019-09-20'],
      selectedWave: null, 
    };
  },
  computed: {
      dateRangeText () {
        return "Wave starts from " + this.dates.join(' to ')
      },
      dateEditRangeText () {
        return "Wave starts from " + this.datesEdit.join(' to ')
      },
    },
  mounted: function() {
    this.getAllWave()
  },
  methods: {
    getAllWave: function(){
      axios
      .get("http://192.168.64.2/php/process.php?action=read_wave")
      .then(response => {
        if (response.data.error) {
          alert(response.data.message);
        } else {
          this.waves = response.data.wave;
        }
      });
    },
    removeWave: function(index) {
      console.log(index);
      var sent_data = new FormData();
      sent_data.append("id", index);
      axios
        .post("http://192.168.64.2/php/process.php?action=delete_wave",sent_data)
        .then(function(response) {
          if (response.data.error) {
            alert(response.data.message);
          } else {
            console.log(response.data.message);
          }
        });
    },
    addWave: function() {
      this.formNew = false;
      console.log(this.dates[0],this.dates[1])
      var formData = new FormData;
      formData.append('start_date', this.dates[1])
      formData.append('end_date', this.dates[0])
      axios
        .post("http://192.168.64.2/php/process.php?action=add_wave", formData)
        .then(function(response) {
          if (response.data.error) {
            console.log(response.data.message);
          } else {
            console.log(response.data.message);
          }
        });
      
    },
    editWave: function(wave){
      console.log(wave.id, wave.date_start, wave.date_end)
      this.datesEdit[0] = wave.date_start.toString()
      this.datesEdit[1] = wave.date_end.toString()
      this.formEdit = true
      this.selectedWave = wave
    },
    updateEditWave(){
      this.formEdit = false
      var sent_data = new FormData()
      console.log(this.selectedWave.id, this.selectedWave.date_start, this.selectedWave.date_end)
      sent_data.append("id",this.selectedWave.id)
      sent_data.append("start_date",this.datesEdit[0])
      sent_data.append("end_date",this.datesEdit[1])
      axios
        .post("http://192.168.64.2/php/process.php?action=update_wave", sent_data)
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
.wave-container {
  display: table;
  width: 100%;
  height: 10%;
  font-family: Tahoma;
  box-sizing: border-box;
  border-bottom: 0.5px solid rgb(66, 66, 66);
  position: relative;
}
.infor-session {
  display: table-cell;
  padding: 1%;
}
.button-session {
  display: table-cell;
  float: right;
  padding-right: 1%;
  justify-content: center;
  align-items: center;
}
</style>