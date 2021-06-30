

require('./bootstrap');

window.Vue = require('vue');

//vForms
import { Form, } from 'vform';
window.Form = Form;

//sweetalert
import Swal from 'sweetalert2'
window.swal = Swal;






Vue.component('example-component', require('./components/ExampleComponent.vue').default);

Vue.component('home-component', require('./components/HomeComponent.vue').default);



const app = new Vue({
    el: '#app',
});
