<template>
    <v-app id="inspire">
        <v-navigation-drawer v-model="drawer" app clipped>
            <v-list nav dense>
                <v-list-item link>
                    <v-list-item-content>
                        Overview
                    </v-list-item-content>
                </v-list-item>
                <v-list-item link>
                    <v-list-item-content>
                        <v-list-item-title>Prevention</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
               
                <v-list-item link>
                          <v-icon>fas fa-share</v-icon>

                    <v-list-item-content>
                        <v-list-item-title>Share</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
            </v-list>
            <v-switch
                             v-model="$vuetify.theme.dark"
                                hide-details
                                inset
                            label=""
                            ></v-switch>
        </v-navigation-drawer>

        <v-app-bar app clipped-left>
            <v-app-bar-nav-icon @click.stop="drawer = !drawer" >
                <i class="material-icons">reorder</i>
            </v-app-bar-nav-icon>
            <v-toolbar-title>Gujarat covid tracker</v-toolbar-title>
        </v-app-bar>

        <v-content>
            <Map></Map>
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
