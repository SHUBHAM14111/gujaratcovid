<template>
    <v-app id="inspire">
        <v-navigation-drawer v-model="drawer" app clipped>
            <v-list nav dense>
                <router-link
                    :to="{ name: 'home' }"
                    style="text-decoration: none; color: inherit;"
                    ><v-list-item link>
                        <v-list-item-action>
                            <v-icon>mdi-home</v-icon>
                        </v-list-item-action>
                        <v-list-item-content>
                            Home
                        </v-list-item-content>
                    </v-list-item></router-link
                ><router-link
                    :to="{ name: 'district' }"
                    style="text-decoration: none; color: inherit;"
                >
                    <v-list-item link>
                        <v-list-item-action>
                            <v-icon>mdi-view-dashboard</v-icon>
                        </v-list-item-action>
                        <v-list-item-content>
                            <v-list-item-title>District</v-list-item-title>
                        </v-list-item-content>
                    </v-list-item></router-link
                >

                <v-list-item link>
                    <v-list-item-content>
                        <v-list-item-title>
                            <v-icon>mdi-share</v-icon> Share</v-list-item-title
                        >
                    </v-list-item-content>
                </v-list-item>
                <v-list-item>
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

<style lang="css" scoped>
a {
    text-decoration: none;
    color: inherit;
}
</style>
