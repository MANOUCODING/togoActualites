
import { createRouter, createWebHistory } from "vue-router";

import HomeComponent from '../components/HomeComponent.vue';

import AboutComponent from '../components/AboutComponent.vue';

import ContactComponent from '../components/ContactComponent.vue';

import DashboardComponent from '../components/admin/DashboardComponent.vue';


//Gestion des categories

import CategoryComponent from '../components/admin/CategoryComponent.vue';

//Gestion des messages

import MessageComponent from '../components/admin/Messages/MessageComponent.vue';

//Gestion des visites

import VisitesComponent from '../components/admin/Visites/VisitesComponent.vue';

//Gestion des articles

import ArticlesPublishComponent from '../components/admin/Articles/ArticlesPublishComponent.vue';

import ArticlesNotPublishComponent from '../components/admin/Articles/ArticlesNotPublishComponent.vue';

import ArticlesByCategoryComponent from '../components/admin/Articles/ArticlesByCategoryComponent.vue';

import ArticlesByAuthorComponent from '../components/admin/Articles/ArticlesByAuthorComponent.vue';

import CreateArticlesComponent from '../components/admin/Articles/Actions/CreateArticlesComponent.vue';


//Gestion des utilisateurs

import UsersExternesComponent from '../components/admin/Users/UsersExternesComponent.vue';

import UsersInternesComponent from '../components/admin/Users/UsersInternesComponent.vue';

import UsersSatistiquesComponent from '../components/admin/Users/UsersSatistiquesComponent.vue';

//Gestion des newsLatters

import NewsLattersComponent from '../components/admin/NewsLatters/NewsLattersComponent.vue';

import StatistiquesNewsLatterComponent from '../components/admin/NewsLatters/StatistiquesNewsLatterComponent.vue';

//Page de connexion

import LoginComponent from '../components/LoginComponent.vue';

//Page d'inscription

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
    path: '/admin/messages',
    component:  MessageComponent,
    name: 'messages'
  },

  {
    path: '/admin/visites',
    component:  VisitesComponent,
    name: 'visites'
  },

  {
    path: '/admin/articles/publish',
    component:  ArticlesPublishComponent,
    name: 'articles.publish'
  },

  {
    path: '/admin/articles/not/publish',
    component:  ArticlesNotPublishComponent,
    name: 'articles.not.publish'
  },

  {
    path: '/admin/articles/by/category',
    component:  ArticlesByCategoryComponent,
    name: 'articles.by.category'
  },

  {
    path: '/admin/articles/by/author',
    component:  ArticlesByAuthorComponent,
    name: 'articles.by.author'
  },

  {
    path: '/admin/articles/create',
    component:  CreateArticlesComponent,
    name: 'articles.create'
  },

  {
    path: '/admin/newslatters/statistiques',
    component: StatistiquesNewsLatterComponent,
    name: 'newslatters.statistiques'
  },

  {
    path: '/admin/newslatters',
    component:  NewsLattersComponent,
    name: 'newslatters'
  },

  {
    path: '/admin/users/statistiques',
    component:  UsersSatistiquesComponent,
    name: 'users.statistiques'
  },

  {
    path: '/admin/users/externes',
    component:  UsersExternesComponent,
    name: 'users.externes'
  },

  {
    path: '/admin/users/internes',
    component: UsersInternesComponent,
    name: 'users.internes'
  },


];

export default createRouter({
  history: createWebHistory(),
  routes
})
