

require('./bootstrap');

window.Vue = require('vue');


Vue.component('address-component', require('./components/AddressComponent.vue').default);
Vue.component('district-component', require('./components/DistrictComponent.vue').default);


const app = new Vue({
    el: '#app',
});
