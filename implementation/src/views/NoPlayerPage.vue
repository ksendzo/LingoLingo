<template>
  <div class="login">
    <Nav/>
    <!--div class = 'row'>
        <div class = 'offset-2 col-2'>
            <router-link to="/player"><div class="card bg-dark text-white">Player</div></router-link>
        </div>
        <div class = "offset-1 col-2">
            <router-link to="/professor"><div class="card bg-dark text-white">Professor</div></router-link>
        </div>
        <div class = "offset-1 col-2">
            <router-link to="/admin"><div class="card bg-dark text-white">Admin</div></router-link>
        </div>
    </div-->
    <br/>
    <div class="row">
      <div class="col-6">
        <login-card/>
      </div>
      <div class="col-6">
        <register-card/>
      </div>

    </div>

  </div>
</template>

<script>
import Nav from '@/components/Nav'
import LoginCard from '../components/noUser/LoginCard.vue'
import RegisterCard from '../components/noUser/RegisterCard.vue'

export default {
  name:'Login',
  components: {
    Nav,
    LoginCard,
    RegisterCard
  },
  beforeMount() {
    if(localStorage.UserTypeId == 1)
      this.$router.replace('/player');
    else if(localStorage.UserTypeId == 2)
      this.$router.replace('/professor');
    else if(localStorage.UserTypeId == 3)
      this.$router.replace('/admin');
  }
}
</script>