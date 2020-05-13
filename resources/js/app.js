

require("./bootstrap");
import Vue from "vue";

window.Vue = require("vue");
import VueGeolocation from "vue-browser-geolocation";
import 'es6-promise/auto'

import GmapCustomMarker from "vue2-gmap-custom-marker";
import * as VueGoogleMaps from "vue2-google-maps";
import GmapCluster from "vue2-google-maps/dist/components/cluster";
import VueRouter from 'vue-router'
import adminboard from './components/AdminComponent'
import addressboard from './components/AddressComponent'
import districtboard from './components/DistrictcrudComponent'
import axios from 'axios';
import VueAxios from 'vue-axios';
import Vuetify from "../plugins/vuetify";
import VueFuse from 'vue-fuse'
import Map from './components/Map'
import district from './components/DistrictComponent'
import Login from './components/LoginComponent'
//import Register from './components/RegisterComponent'
import Notfound from './components/Notfound'

import App from './components/ExampleComponent'
import auth from './auth'
import VueAuth from '@websanova/vue-auth'
import Geocoder from "@pderas/vue2-geocoder";



Vue.use(VueGeolocation);
Vue.use(GmapCustomMarker);

Vue.use(VueRouter);
Vue.use(VueGoogleMaps, {
    load: {
        key: "AIzaSyCP9uBD7K6ncLh6XeowYEgrRCesBaYj6e0",
        libraries: "places" // This is required if you use the Autocomplete plugin
    }
});

Vue.use(Geocoder, {
    defaultCountryCode: 'IN', // e.g. 'CA'
    defaultLanguage:    'en', // e.g. 'en'
    defaultMode:        'address', // or 'lat-lng'
    googleMapsApiKey:   "AIzaSyCP9uBD7K6ncLh6XeowYEgrRCesBaYj6e0"
});



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

Vue.component(
    "example-component",
    require("./components/ExampleComponent.vue").default
);
Vue.component("Map", require("./components/Map.vue").default);
Vue.component("DistrictComponent", require("./components/DistrictComponent.vue").default);

Vue.component("cluster", GmapCluster);
Vue.component("gmap-custom-marker", GmapCustomMarker);





const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Map,
            meta: {
                auth: undefined,
            }
        },
        {
            path: '/district',
            name: 'district',
            component: district,
            meta: {
                auth: undefined
            }
        },
        {
            path: '/login',
            name: 'login',
            component: Login,
            meta: {
                auth: false
            }
        },
        //disable register once used
        // {
        //     path: '/register',
        //     name: 'register',
        //     component: Register,
        //     meta: {
        //         auth: false
        //     }
        // },

        {
            path: '*',
            component: Notfound,
            meta: {
                auth: undefined
            }
        },

        //above
        {
            path: '/admin/',
            component: adminboard,
           
            children: [
                {
                  path: '',
                  name: 'admin.district',
                  component: districtboard,
                  
                },
                {
                    path: 'addressboard',
                    name: 'admin.address',
                    component: addressboard,
                    
                },
                ],
                meta: {
                    auth: true
                },
        }
    ],
});

Vue.router = router
Vue.use(VueAxios, axios)
axios.defaults.baseURL = `http://127.0.0.1:8000/api` //change it 
Vue.use(VueAuth, auth)

App.router = Vue.router
App.vuetify = Vuetify
new Vue(App).$mount('#app');
