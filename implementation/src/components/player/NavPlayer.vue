<template>
  <div>
    <div class = "row">
        <div class = " offset-1 col-10 naslov" id="" >
            <router-link to="/player"> 
                <img src="@/assets/logo.png"/>
            </router-link>
        </div>
        <!--div class="col-1 " id="poz"-->
        <button class="logout" v-on:click="logout()"> <!--type="submit" name="" value="Log out " href="#"-->
            
            <img src="@/assets/logout.png" width="30" height="30"/>
        </button>
    </div>

  </div>
</template>

<style>
.navTab {
  list-style-type: none;
  margin: 0;
  padding: 40px;
  font-size: 20px;
  color: rgb(73, 180, 216);
  font-weight: bolder;
  font-family: Apple Chancery, cursive	;
  }

  .navTab a{
    list-style-type: none;
    color: rgb(73, 180, 216)
  }

  .navTab a:hover {
    list-style-type: none;
    color: rgb(73, 180, 216);
    text-decoration: none;
  }



</style>


<script>
export default {
    name: 'NavPlayer',
    methods: {
        logout(){
            localStorage.setItem("Username", '');
            localStorage.setItem("UserTypeId", 0);
            localStorage.setItem("language", '');
            this.$router.replace('/');
        }
    }
}
</script>
