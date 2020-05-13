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

      <h2> 404 Page not found </h2>
    
      
      </v-col>
      </v-card>
      </v-layout>
  </v-app>
    </div>

</template>