
import { createRouter, createWebHistory } from "vue-router";

import WelcomeComponent from '../components/WelcomeComponent.vue';

import DashboardComponent from '../components/admin/DashboardComponent.vue';

import LoginComponent from '../components/LoginComponent.vue';

const routes = [

  {
    path: '/',
    component: WelcomeComponent,
    name: 'welcome'
  },

  {
    path: '/welcome',
    component: WelcomeComponent,
    name: 'welcome'
  },

  {
    path: '/home',
    component: WelcomeComponent,
    name: 'welcome'
  },

  {
    path: '/login',
    component: LoginComponent,
    name: 'login'
  },  

  {
    path: '/admin/login',
    component: LoginComponent,
    name: 'login'
  },  

  {
    path: '/admin',
    component: LoginComponent,
    name: 'login'
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