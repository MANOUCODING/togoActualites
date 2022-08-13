require('./bootstrap');

import { createApp } from 'vue';

import router from './router';

import App from './components/App.vue';

import Toaster from "@meforma/vue-toaster";

import headerComponent from './components/includes/app/headerComponent.vue';

import footerComponent from './components/includes/app/footerComponent.vue';

import adminheaderComponent from './components/includes/admin/headerComponent.vue';

import adminfooterComponent from './components/includes/admin/footerComponent.vue';

const app = createApp(App);

app.component('headerbar', headerComponent);

app.component('footerbar', footerComponent);

app.component('adminheaderbar', adminheaderComponent);

app.component('adminfooterbar', adminfooterComponent);


app.use(Toaster).use(router).mount('#app');
