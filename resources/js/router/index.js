
import { createRouter, createWebHistory } from "vue-router";

import HomeComponent from '../components/HomeComponent.vue';

import AboutComponent from '../components/AboutComponent.vue';

import ContactComponent from '../components/ContactComponent.vue';

import DashboardComponent from '../components/admin/DashboardComponent.vue';

import LoginComponent from '../components/LoginComponent.vue';

import RegisterComponent from '../components/RegisterComponent.vue';

const routes = [

  {
    path: '/',
    component: HomeComponent,
    name: 'home'
  },

  {
    path: '/about',
    component: AboutComponent,
    name: 'about'
  },

  {
    path: '/contact',
    component: ContactComponent,
    name: 'contact'
  },
 

  {
    path: '/login',
    component: LoginComponent,
    name: 'login'
  },  

  {
    path: '/register',
    component: RegisterComponent,
    name: 'register'
  },  
  

  {
    path: '/admin/dashboard',
    component:  DashboardComponent,
    name: 'dashboard'
  },

];

export default createRouter({
  history: createWebHistory(),
  routes
})