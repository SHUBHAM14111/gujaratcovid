/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue");
import VueGeolocation from "vue-browser-geolocation";
Vue.use(VueGeolocation);
import GmapCustomMarker from "vue2-gmap-custom-marker";
Vue.use(GmapCustomMarker);
import * as VueGoogleMaps from "vue2-google-maps";
import GmapCluster from "vue2-google-maps/dist/components/cluster";
Vue.use(VueGoogleMaps, {
    load: {
        key: "AIzaSyCP9uBD7K6ncLh6XeowYEgrRCesBaYj6e0",
        libraries: "places" // This is required if you use the Autocomplete plugin
    }
});

import Vuetify from "../plugins/vuetify";
import VueFuse from 'vue-fuse'
 
Vue.use(VueFuse)
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
Vue.component("gmap-custom-marker", GmapCustomMarker);
Vue.component(
    "example-component",
    require("./components/ExampleComponent.vue").default
);
Vue.component("Map", require("./components/Map.vue").default);

Vue.component("cluster", GmapCluster);
Vue.component("gmap-custom-marker", GmapCustomMarker);


const app = new Vue({
    vuetify: Vuetify,
    el: "#app"
});
export default new Vuetify({
    icons: {
      iconfont: 'mdiSvg',
    },
  });