<template>
 <v-app id="inspire">
   <v-card
      color="grey lighten-4"
      flat
      height="100px"
      tile
    >
      <v-toolbar dense height="100px">
        <v-icon>mdi-dashboard</v-icon>

          <v-toolbar-title><h2>Admin panel</h2></v-toolbar-title>

  
        <v-spacer></v-spacer>
  
        <v-btn :to="{name:'admin.district'}">
            District pannel
        </v-btn>
  
        <v-btn :to="{name:'admin.address'}">
          Address pannel

        </v-btn>
  
        <v-btn v-if="$auth.check()" @click.prevent="$auth.logout()" color="primary">
          Log out
        </v-btn>
      </v-toolbar>
    </v-card>
   
    <router-view/>
  </v-app>
</template>

