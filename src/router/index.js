import Vue from 'vue'
import VueRouter from 'vue-router'
import PlayerIndex from '../views/PlayerIndex.vue'
import About from '../views/About'
import NoPlayerPage from '../views/NoPlayerPage.vue'
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
  }

]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router


