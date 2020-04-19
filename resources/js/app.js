

require('./bootstrap');

window.Vue = require('vue');


Vue.component('address-component', require('./components/AddressComponent.vue').default);


const app = new Vue({
    el: '#app',
});
