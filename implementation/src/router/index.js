import Vue from 'vue'
import About from '../views/About'
import VueRouter from 'vue-router'
import AdminPage from '../views/AdminPage.vue'
import PlayerIndex from '../views/PlayerIndex.vue'
import NoPlayerPage from '../views/NoPlayerPage.vue'
import ProfessorPage from '../views/ProfessorPage.vue'
import QuestionPage from '../views/QuestionPage.vue'
import RangList from '../components/player/RangList.vue'


import 'bootstrap/dist/css/bootstrap.min.css'
import 'bootstrap/dist/js/bootstrap'

Vue.use(VueRouter)

const routes = [
  {
    path: '/player',
    name: 'PlayerIndex',
    component: PlayerIndex
  },
  {
    path: '/about',
    name: 'About',
    component: About
  },
  {
    path: '/professor',
    name:'Professor',
    component: ProfessorPage
  },
  {
    path: '/admin',
    name:'Admin',
    component: AdminPage
  },
  {
    path: '/',
    name: 'Login',
    component: NoPlayerPage
  },
  {
    path: '/question',
    name: 'Question', 
    component: QuestionPage
  },
  {
    path: '/player/rangList',
    name: 'RangList',
    component: RangList
  }


]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router


