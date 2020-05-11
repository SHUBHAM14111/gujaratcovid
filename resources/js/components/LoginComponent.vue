<template>
    
    <div id="app">

    <v-app id="inspire">

      <v-layout
          align-center
          justify-center
        >

      <v-card
      width="500px"
      elevation="20"
      >
            <v-alert type="warning" v-if="has_error" dismissible>Either mail or password is wrong </v-alert>

      <v-col justify="space-between">

      <h2> Admin board </h2>
    <v-form
      ref="form"
      autocomplete="off" @submit.prevent="login" method="post"
    >

      <v-text-field
        v-model="email"
        label="E-mail"
        id="email"
        :rules="emailRules"

        type="email"
        required
      ></v-text-field>
            <v-text-field
        v-model="password"
        label="password"
        id="password"
        :rules="passwordRules"

        required
        type="password"
      ></v-text-field>
  
      <v-btn
        color="success"
        class="mr-4"
        type="submit"
        :disabled="!valid"

      >
        Login
      </v-btn>

  
    </v-form>
      </v-col>
      </v-card>
      </v-layout>
  </v-app>
    </div>

</template>
<script>
  export default {
    data() {
      return {
            valid: true,

        email: '',
        password: '',
        has_error: false,
        emailRules: [
            v => !!v || 'Email is required',
            v => /.+@.+\..+/.test(v) || 'E-mail must be valid',

        ],
        passwordRules: [
              v => !!v || 'password is required',
        ],
      }
    },
    mounted() {
      //
    },
    methods: {
      login() {
        // get the redirect object
        var redirect = this.$auth.redirect()
        var app = this
        this.$auth.login({
          params: {
            email: app.email,
            password: app.password
          },
          success: function() {
            // handle redirection
            // const redirectTo = redirect  
            // this.$router.push({name: redirectTo})
          },
          error: function() {
            app.has_error = true
          },
          rememberMe: true,
          fetchUser: true
        })
      }
    }
  }
</script>