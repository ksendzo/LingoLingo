import Vue from 'vue'
import VueRouter from 'vue-router'
import PlayerIndex from '../views/PlayerIndex.vue'
import About from '../views/About'
import NoPlayerPage from '../views/NoPlayerPage.vue'
//import Professor from '../views/ProfessorPage.vue'
//import Admin from '../views/AdminPage'
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
    path: '/',
    name: 'Login',
    component: NoPlayerPage
  },
  /*{
    path: '/professor',
    name:'Professor',
    component: ProfessorPage
  },
  {
    path: '/admin',
    name:'Admin',
    component: AdminPage
  }*/

]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router


