require('./bootstrap');

import { createApp } from 'vue';

import router from './router';

import App from './components/App.vue';

import VueSweetalert2 from 'vue-sweetalert2';

import VueSocialSharing from 'vue-social-sharing'


// If you don't need the styles, do not connect
import 'sweetalert2/dist/sweetalert2.min.css';

import Toaster from "@meforma/vue-toaster";

import CKEditor from '@ckeditor/ckeditor5-vue';


import LaravelVuePagination from 'laravel-vue-pagination';

import headerComponent from './components/includes/app/headerComponent.vue';

import footerComponent from './components/includes/app/footerComponent.vue';

import adminheaderComponent from './components/includes/admin/headerComponent.vue';

import adminfooterComponent from './components/includes/admin/footerComponent.vue';

import publicateurheaderComponent from './components/includes/publicateur/headerComponent.vue';

import publicateurfooterComponent from './components/includes/publicateur/footerComponent.vue';

const app = createApp(App);

app.component('headerbar', headerComponent);

app.component('footerbar', footerComponent);

app.component('adminheaderbar', adminheaderComponent);

app.component('adminfooterbar', adminfooterComponent);

app.component('publicateurheaderbar', publicateurheaderComponent);

app.component('publicateurfooterbar', publicateurfooterComponent);

app.component('pagination', LaravelVuePagination);

app.use(LaravelVuePagination);

app.use(CKEditor);

app.use(VueSocialSharing);

app.use(VueSweetalert2);

app.use(Toaster).use(router).mount('#app');
