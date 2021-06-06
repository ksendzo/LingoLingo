<!--  Ksenija Bulatovic 2019/0730
      Miloš Ćirković 2017/0333
      Miloš Jovanović 2013/0669 -->

<template>
<div>
    <div class = "row">
        <div class = " offset-1 col-10 naslov" id="" >
            <router-link to="/professor"> 
                <img src="@/assets/logo.png"/>
            </router-link>
        </div>
        <!--div class="col-1 " id="poz"-->
        <button class="logout" v-on:click="logout()"> <!--type="submit" name="" value="Log out " href="#"-->
            
            <img src="@/assets/logout.png" width="30" height="30"/>
        </button>
    </div>
    <br/>
    <br/>
</div>
</template>


<script>
export default {
    name: 'NavPrfessor',
    methods: {
        logout(){
            localStorage.setItem("Username", '');
            localStorage.setItem("UserTypeId", 0);
            this.$router.replace('/');
        }
    }
}
</script>