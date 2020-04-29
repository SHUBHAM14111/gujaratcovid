<template>

    <v-app id="inspire">
        
        <v-navigation-drawer v-model="drawer" app clipped>

            <v-list nav dense>
                <v-list-item link>
                    <v-list-item-content>
                    <router-link :to="{ name: 'home' }">Home</router-link> 
                    </v-list-item-content>
                </v-list-item>
                <v-list-item link>
                    <v-list-item-content>
                    <router-link :to="{ name: 'district' }">District</router-link> 
                    </v-list-item-content>
                </v-list-item>
               
                <v-list-item link>

                    <v-list-item-content>
                        <v-list-item-title>      <v-icon>mdi-share</v-icon>
Share</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
             <v-list-item >
                  <v-switch
                             v-model="$vuetify.theme.dark"
                                hide-details
                                inset
                                small
                            label="Theme dark"
                            ></v-switch>
             </v-list-item>
            </v-list>
          
        </v-navigation-drawer>

        <v-app-bar app clipped-left>
            <v-app-bar-nav-icon @click.stop="drawer = !drawer" />
            <v-toolbar-title>Gujarat covid tracker</v-toolbar-title>
        </v-app-bar>

        <v-content>
            
                <router-view></router-view>

        </v-content>

        <v-footer app>
            <span>GujaratCovid&copy; 2020</span>
        </v-footer>
    </v-app>
</template>

<script>
export default {
    props: {
        source: String
    },

    data: () => ({
        drawer: null
    }),

    created() {
        this.$vuetify.theme.dark = false;
    }
};
</script>
