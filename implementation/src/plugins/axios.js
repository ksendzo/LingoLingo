/*  
  Miloš Jovanović 2013/0669 
*/

import Vue from 'vue'
import axios from 'axios'

const guest = axios.create({
    baseURL: "http://localhost/lingolingo/public/user", 
    headers: {
        "Content-Type": "application/x-www-form-urlencoded",
        "X-Requested-With": "XMLHttpRequest"
    },
});

Vue.prototype.$guest = guest;

const player = axios.create({
    baseURL: "http://localhost/lingolingo/public/player", 
    headers: {
        "Content-Type": "application/x-www-form-urlencoded",
        "X-Requested-With": "XMLHttpRequest"
    },
});

Vue.prototype.$player = player;

const professor = axios.create({
    baseURL: "http://localhost/lingolingo/public/professor", 
    headers: {
        "Content-Type": "application/x-www-form-urlencoded",
        "X-Requested-With": "XMLHttpRequest"
    },
});

Vue.prototype.$professor = professor;

const admin = axios.create({
    baseURL: "http://localhost/lingolingo/public/administrator", 
    headers: {
        "Content-Type": "application/x-www-form-urlencoded",
        "X-Requested-With": "XMLHttpRequest"
    },
});

Vue.prototype.$admin = admin;

export { guest, player, professor, admin };