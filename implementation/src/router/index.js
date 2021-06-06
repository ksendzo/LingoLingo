/*  
  Ksenija Bulatovic 2019/0730
  Miloš Ćirković 2017/0333
*/

import Vue from 'vue'
import VueRouter from 'vue-router'
import AdminPage from '../views/AdminPage.vue'
import PlayerPage from '../views/PlayerPage.vue'
import NoPlayerPage from '../views/NoPlayerPage.vue'
import ProfessorPage from '../views/ProfessorPage.vue'
import QuestionPage from '../views/QuestionPage.vue'
import RangList from '../components/player/RangList.vue'
import ReportList from '@/views/ReportList.vue'
import RequestPage from '@/views/RequestPage.vue'


import 'bootstrap/dist/css/bootstrap.min.css'
import 'bootstrap/dist/js/bootstrap'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'NoPlayer',
    component: NoPlayerPage
  },
  {
    path: '/player',
    name: 'PlayerPage',
    component: PlayerPage
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
    path: '/question',
    name: 'Question', 
    component: QuestionPage
  },
  {
    path: '/player/rangList',
    name: 'RangList',
    component: RangList
  },
  {
    path: '/admin/ReportList',
    name: 'ReportList',
    component: ReportList
  },
  {
    path: '/admin/RequestPage',
    name: 'RequestPage',
    component: RequestPage
  }

]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router


