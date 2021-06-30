

require('./bootstrap');

window.Vue = require('vue');

//vForms
import { Form, } from 'vform';
window.Form = Form;

//sweetalert
import Swal from 'sweetalert2'
window.swal = Swal;

//toast alert
import Toaster from 'v-toaster'
// You need a specific loader for CSS files like https://github.com/webpack/css-loader
import 'v-toaster/dist/v-toaster.css'
// optional set default imeout, the default is 10000 (10 seconds).
Vue.use(Toaster, {timeout: 5000})






Vue.component('example-component', require('./components/ExampleComponent.vue').default);

Vue.component('home-component', require('./components/HomeComponent.vue').default);



const app = new Vue({
    el: '#app',
});
