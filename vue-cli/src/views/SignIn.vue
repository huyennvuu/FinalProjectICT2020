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
                        <v-form ref="SignInForm" lazy-validation>
                          <v-text-field
                            label="Email"
                            name="Email"
                            :rules="[rules.required, rules.email]"
                            prepend-icon="mdi-email"
                            type="text"
                            color="blue darken-3"
                            v-model="currUser.email"
                          />
                          <v-text-field
                            id="password"
                            label="Password"
                            :append-icon="show ? 'mdi-eye' : 'mdi-eye-off'"
                            :rules="[rules.required, rules.min]"
                            :type="show ? 'text' : 'password'"
                            prepend-icon="mdi-lock"
                            color="blue darken-3"
                            hint="At least 8 character"
                            @click:append="show =! show"
                            v-model="currUser.password"
                          />
                        </v-form>
                        <h3
                          class="text-center mt-3"
                          @click="dialogForget = true"
                        >Forget your password ?</h3>
                      </v-card-text>
                      <div class="text-center mt-3">
                        <v-btn rounded color="blue darken-3" dark @click="signIn()">SIGN IN</v-btn>
                      </div>
                    </v-col>
                    <v-col cols="12" md="4" class="blue darken-3">
                      <v-card-text class="white--text mt-12">
                        <h1 class="text-center display-1">Hello Friend!</h1>
                        <h5 class="text-center">Enter your information</h5>
                      </v-card-text>
                      <div class="text-center">
                        <v-btn rounded outlined @click="step++; SIreset()" dark>Need an account?</v-btn>
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
                        <v-btn rounded outlined @click="step--; SUreset()" dark>Have an account?</v-btn>
                      </div>
                    </v-col>
                    <v-col cols="12" md="8">
                      <v-card-text class="mt-12">
                        <h1 class="text-center display-2 blue--text text--darken-3">Sign Up</h1>
                        <h4 class="text-center mlt-4">Create an account</h4>
                        <v-form ref="SignUpForm" lazy-validation>
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
                            :rules="[rules.required, rules.email]"
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
                            :rules="[passwordConfirmationRule]"
                            prepend-icon="mdi-correct"
                            type="password"
                            color="blue darken-3"
                            v-model="newUser.cfpassword"
                          />
                          <div class="text-center mt-3">
                            <v-btn rounded color="blue darken-3" dark @click="signUp()">SIGN UP</v-btn>
                          </div>
                        </v-form>
                      </v-card-text>
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
import axios from "axios";
export default {
  data: () => {
    return {
      name: "",
      step: 1,
      dialogForget: false,
      show: false,
      show1: false,
      errorMsg: "",
      rules: {
        required: value => !!value || "Required!",
        min: v => v.length >= 8 || "Min 8 characters",
        email: v => /.+@.+\..+/.test(v) || "E-mail must be valid"
      },
      newUser: {
        name: "",
        email: "",
        password: "",
        cfpassword: ""
      },
      currUser: {
        email: "",
        password: ""
      }
    };
  },
  props: {
    source: String
  },
  computed: {
    passwordConfirmationRule() {
      return () =>
        this.newUser.password === this.newUser.cfpassword ||
        "Password must match";
    }
  },
  methods: {
    SUvalidate() {
      this.$refs.SignUpForm.validate();
    },
    SUreset() {
      this.$refs.SignUpForm.reset();
    },
    // SUresetValidation() {
    //   this.$refs.SignUpForm.resetValidation();
    // },

    signUp: function() {
      this.SUvalidate();
      if (!this.$refs.SignUpForm.validate()) {
        alert("Invalid Form");
      } else {
        this.addUser();
      }
    },

    SIvalidate() {
      this.$refs.SignInForm.validate();
    },
    SIreset() {
      this.$refs.SignInForm.reset();
    },
    // SIresetValidation() {
    //   this.$refs.SignInForm.resetValidation();
    // },

    signIn: function() {
      this.SIvalidate();
      if (!this.$refs.SignInForm.validate()) {
        console.log("Invalid Form");
      } else {
        this.loginUser();
      }
    },

    addUser() {
      var formData = this.toFormData(this.newUser, "sign_up");
      axios
        .post("http://192.168.64.2/php/process.php?action=create", formData)
        .then(function(response) {
          if (response.data.error) {
            alert(response.data.message);
          } else {
            alert(response.data.message);
          }
        }).finally(()=>{
          this.SUreset();
          this.step = 1;
        });
    },

    loginUser() {
      var formData = this.toFormData(this.currUser, "sign_in");
      axios
        .post("http://192.168.64.2/php/process.php?action=login", formData)
        .then(function(response) {
          if (response.data.error) {
            alert(response.data.message);
          } else {
            window.location = "/"+response.data.account_type.type
          }
        }).finally(()=>{
          this.SIreset()
        });
    },

    toFormData(obj, type) {
      var fd = new FormData();
      if (type == "sign_up") {
        fd.append("name", obj["name"]);
        fd.append("email", obj["email"]);
        fd.append("password", obj["password"]);
      } else if (type == "sign_in") {
        fd.append("email", obj["email"]);
        fd.append("password", obj["password"]);
      }
      return fd;
    }
  }
};
</script>

<style scoped>
</style>