<template>
  <div class="login">
    <h1>Wellcome to login page!</h1>

    <div class = 'row'>
        <div class = 'offset-2 col-2'>
            <router-link to="/player"><div class="card bg-dark text-white">Player</div></router-link>
        </div>
        <div class = "offset-1 col-2">
            <router-link to="/professor"><div class="card bg-dark text-white">Professor</div></router-link>
        </div>
        <div class = "offset-1 col-2">
            <router-link to="/admin"><div class="card bg-dark text-white">Admin</div></router-link>
        </div>
    </div>

  </div>
</template>

<script>
//import { component } from 'vue/types/umd'
export default {
  name:'Login',
}
</script>