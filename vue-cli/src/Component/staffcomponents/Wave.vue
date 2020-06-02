<template>
  <v-container fluid style="margin: 0px; padding: 0px; width: 100%; height: 80vh">
    <div style="height: 50vh; overflow-y: scroll ;">
      <v-list>
        <v-list-item-group>
          <v-list-item v-for="i in waveID" :key="i">
            <template >
              <v-list-item-content>
                <v-list-item-title>Wave Name: {{i}}</v-list-item-title>
                <v-list-item-subtitle wrap>Start Date: | End Date: | Status: | Total:</v-list-item-subtitle>
              </v-list-item-content>
              <div class="my-2">
              <v-btn small outlined color="blue" dark>
                <v-icon left>mdi-pencil</v-icon> Edit </v-btn>
              <v-btn small color="error" dark @click="removeWave(i)">
                <v-icon left>mdi-delete</v-icon> Delete</v-btn>
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
      <input type="text" placeholder="New Wave Name" v-model="newWave" />
      <v-btn @click="addWave(newWave)" fab color="primary">
        <v-icon>mdi-plus</v-icon></v-btn>
    </div>
  </v-container>
</template>
<script>
export default {
  data() {
    return {
      waveID: [1, 2, 3],
      count: 3,
      newWave: undefined
    };
  },
  methods: {
    removeWave: function(index) {
      for (var i = 0; i < this.waveID.length; i++) {
        if (this.waveID[i] == index) this.waveID.splice(i, 1);
      }
    },
    addWave: function(wavename) {
    var existed = false
      for (var i = 0; i < this.waveID.length; i++) {
        if (this.waveID[i] == wavename)  {
            alert("Existed wave");
            existed = true;
        }
      }
      if(!existed)
        this.waveID.push(wavename)
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