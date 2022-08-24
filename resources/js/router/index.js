
import { createRouter, createWebHistory } from "vue-router";

import HomeComponent from '../components/HomeComponent.vue';

import AboutComponent from '../components/AboutComponent.vue';

import ContactComponent from '../components/ContactComponent.vue';

import DashboardComponent from '../components/admin/DashboardComponent.vue';

import CategoryComponent from '../components/admin/CategoryComponent.vue';

//Gestion des articles

import ArticlesAllComponent from '../components/admin/Articles/ArticlesAllComponent.vue';

import CreateArticlesComponent from '../components/admin/Articles/Actions/CreateArticlesComponent.vue';

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

  {
    path: '/admin/category',
    component:  CategoryComponent,
    name: 'category'
  },

  {
    path: '/admin/articles',
    component:  ArticlesAllComponent,
    name: 'articles.all'
  },

  {
    path: '/admin/articles/create',
    component:  CreateArticlesComponent,
    name: 'articles.create'
  },
  

];

export default createRouter({
  history: createWebHistory(),
  routes
})