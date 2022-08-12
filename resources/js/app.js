require('./bootstrap');

import { createApp } from 'vue';

import router from './router';

import App from './components/App.vue';

import Login from './components/LoginComponent.vue';

import Welcome from './components/WelcomeComponent.vue';

import headerComponent from './components/includes/headerComponent.vue';

import footerComponent from './components/includes/footerComponent.vue';

const app = createApp(App);

const login = createApp(Login);

const welcome = createApp(Welcome);

welcome.component('headerbar', headerComponent);

welcome.component('footerbar', footerComponent);

welcome.mount('#welcome');

login.use(router).mount('#login');

app.use(router).mount('#app');
