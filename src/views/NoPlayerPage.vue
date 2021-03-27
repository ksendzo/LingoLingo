<template>
  <div class="login">
    <h1>Wellcome to login page!</h1>

    <div class = 'row'>
        <div class = 'offset-1 col-2'>
            <router-link to="/player"><button type="button" class="btn btn-primary">Player</button></router-link>
        </div>
        <div class = "offset-1 col-2">
            <router-link to="/professor"><button type="button" class="btn btn-primary">Professor</button></router-link>
        </div>
        <div class = "offset-1 col-2">
            <router-link to="/admin"><button type="button" class="btn btn-primary">Admin</button></router-link>
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