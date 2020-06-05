<template>
  <v-app>
    <v-dialog v-model="dialogForget" max-width="500px">
      <v-card>
        <v-card-title>Filter</v-card-title>
        <v-card-text></v-card-text>
        <v-card-actions>
          <v-btn color="primary" text @click="dialogForget = false">Close</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
    <v-content>
      <v-container class="fill-height" fluid>
        <v-row align="center" justify="center">
          <v-col cols="12" sm="8" md="8">
            <v-card class="elevation-12">
              <v-window v-model="step">
                <v-window-item :value="1">
                  <v-row>
                    <v-col cols="12" md="8">
                      <v-card-text class="mt-12">
                        <h1 class="text-center display-2 blue--text text--darken-3">Sign In</h1>
                        <h4 class="text-center mlt-4">Ensure your email for registration</h4>
                        <v-form>
                          <v-text-field
                            label="Email"
                            name="Email"
                            prepend-icon="mdi-email"
                            type="text"
                            color="blue darken-3"
                          />
                          <v-text-field
                            id="password"
                            label="Password"
                            :append-icon="show ? 'mdi-eye' : 'mdi-eye-off'"
                            :rules="[rules.required, rules.min]"
                            :type="show ? 'text' : 'password'"
                            name="Email"
                            prepend-icon="mdi-lock"
                            color="blue darken-3"
                            hint="At least 8 character"
                            @click:append="show =!show"
                          />
                        </v-form>
                        <h3
                          class="text-center mt-3"
                          @click="dialogForget = true"
                        >Forget your password ?</h3>
                      </v-card-text>
                      <div class="text-center mt-3">
                        <v-btn rounded color="blue darken-3" dark>SIGN IN</v-btn>
                      </div>
                    </v-col>
                    <v-col cols="12" md="4" class="blue darken-3">
                      <v-card-text class="white--text mt-12">
                        <h1 class="text-center display-1">Hello Friend!</h1>
                        <h5 class="text-center">Enter your information</h5>
                      </v-card-text>
                      <div class="text-center">
                        <v-btn rounded outlined @click="step++" dark>Need an account?</v-btn>
                      </div>
                    </v-col>
                  </v-row>
                </v-window-item>
                <v-window-item :value="2">
                  <v-row class="fill-height">
                    <v-col cols="12" md="4" class="blue darken-3">
                      <v-card-text class="white--text mt-12">
                        <h1 class="text-center display-1">Hello Friend!</h1>
                        <h5 class="text-center">Enter your information</h5>
                      </v-card-text>
                      <div class="text-center">
                        <v-btn rounded outlined @click="step--" dark>Have an account?</v-btn>
                      </div>
                    </v-col>
                    <v-col cols="12" md="8">
                      <v-card-text class="mt-12">
                        <h1 class="text-center display-2 blue--text text--darken-3">Sign Up</h1>
                        <h4 class="text-center mlt-4">Create an account</h4>
                        <v-form ref="SignUpForm">
                          <v-text-field
                            label="Username"
                            name="Username"
                            :rules="[rules.required]"
                            prepend-icon="mdi-account"
                            type="text"
                            color="blue darken-3"
                            v-model="newUser.name"
                          />
                          <v-text-field
                            label="Email"
                            name="Email"
                            :rules="[rules.required]"
                            prepend-icon="mdi-email"
                            type="text"
                            color="blue darken-3"
                            v-model="newUser.email"
                          />
                          <v-text-field
                            id="password"
                            label="Password"
                            :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
                            :rules="[rules.required, rules.min]"
                            :type="show1 ? 'text' : 'password'"
                            prepend-icon="mdi-lock"
                            color="blue darken-3"
                            hint="At least 8 character"
                            @click:append="show1 =!show1"
                            v-model="newUser.password"
                          />
                          <v-text-field
                            id="password"
                            label="Confirm Password"
                            name="Email"
                            :rules="[passwordConfirmationRule]"
                            prepend-icon="mdi-correct"
                            type="password"
                            color="blue darken-3"
                            v-model="newUser.cfpassword"
                          />
                          <div class="text-center mt-3">
                            <v-checkbox color="blue darken-3">
                              <template v-slot:label>
                                <div @click.stop>
                                  Do you accept the
                                  <a
                                    href="javascript:;"
                                    @click.stop="terms = true"
                                  >terms</a>
                                  and
                                  <a
                                    href="javascript:;"
                                    @click.stop="conditions = true"
                                  >conditions?</a>
                                </div>
                              </template>
                            </v-checkbox>
                          </div>
                        </v-form>
                      </v-card-text>
                      <div class="text-center mt-3">
                        <v-btn rounded color="blue darken-3" dark @click="signUp()">SIGN UP</v-btn>
                      </div>
                    </v-col>
                  </v-row>
                </v-window-item>
              </v-window>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
    </v-content>
  </v-app>
</template>
<script>
import axios from 'axios';
export default {
  data: () => {
    return {
      step: 1,
      dialogForget: false,
      show: false,
      show1: false,
      errorMsg: '',
      rules: {
        required: value => !!value || "Required!",
        min: v => v.length >= 8 || "Min 8 characters",
      }, 
      newUser: {
        name: '',
        email: '',
        password: '',
        cfpassword: ''
      },
    };
  },
  props: {
    source: String
  },
  computed: {
    passwordConfirmationRule() {
      return () => (this.newUser.password === this.newUser.cfpassword) || 'Password must match'
    },
  },
  methods: {
    signUp: function(){
      this.$refs.SignUpForm.validate()
      if(this.newUser.password != this.newUser.cfpassword){
        alert("Re-type")
      }
      else{
        // this.addUser();
        // this.step = 1
      }
    },
    addUser(){
      var formData = this.toFormData(this.newUser);
      console.log(formData.getAll('name'))
      axios.post("http://192.168.64.2/php/process.php?action=create", formData).then(function(response){
      console.log(response)
        if(response.data.error){
          console.log(response.data.message)
        }
        else{
          alert(response.data.message)
        }
      })
    },
    toFormData(obj){
      var fd = new FormData();
      fd.append('name',obj['name'])
      fd.append('email',obj['email'])
      fd.append('password',obj['password'])
      return fd
    }
  }
};
</script>

<style scoped>
</style>