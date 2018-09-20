/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';
window.Vue.use(VueRouter);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
import ContactsIndex from './components/Contacts/ContactsIndex.vue';
import ContactsCreate from './components/Contacts/ContactsCreate.vue';
import ContactsEdit from './components/Contacts/ContactsEdit.vue';

const routes = [
    {
        path: '/',
        components: {
            contactsIndex: ContactsIndex
        }
    },
    {path: '/create', component: ContactsCreate, name: 'createContact'},
    {path: '/edit/:id', component: ContactsEdit, name: 'editContact'},
];

const router = new VueRouter({routes});

const app = new Vue({router}).$mount('#app');
