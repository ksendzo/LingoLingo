/*  
  Ksenija Bulatovic 2019/0730
  Miloš Ćirković 2017/0333
  Miloš Jovanović 2013/0669 
*/

import Vue from 'vue'
import App from './App.vue'
import router from './router'
import { guest } from './plugins/axios'


Vue.config.productionTip = false


new Vue({
  router,
  guest,
  render: h => h(App),
  data: {color: '#550055'}
}).$mount('#app')