import Vue from 'vue';
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue';

import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';

Vue.use(BootstrapVue);
Vue.use(IconsPlugin);

Vue.component('checkout-component', require('./components/CheckoutComponent.vue').default);
Vue.component('success-component', require('./components/SuccessComponent.vue').default);

const app = new Vue({
    el: '#app',
});
