<template>
  <div class="login">
    <Nav/>
    <h1>Choose the user type to see the prototype</h1>
    <br/>

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
import Nav from '@/components/Nav'

export default {
  name:'Login',
  components: {
    Nav
  }
}
</script>