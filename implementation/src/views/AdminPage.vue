<!--  Ksenija Bulatovic 2019/0730
      Miloš Ćirković 2017/0333 -->

<template>
  <div class="admin">
    <NavAdmin/>
    <br/>
    <div class="row">
      <div class="offset-2 col-3 box rangList">
        <router-link to='/admin/RequestPage'>
          <h2>Requests</h2>
        </router-link>
      </div>
      <div class="offset-2 col-3 box rangList">
        <router-link to='/admin/reportList'>
          <h2>Reports</h2>
        </router-link>
      </div>
    </div>
    <br/>
    <br/>
    <br/>

  </div>
</template>

<script>
import NavAdmin from '@/components/admin/NavAdmin'

export default {

  name:'AdminPage',
  components:{
     NavAdmin

  },
  beforeMount(){
        if(!localStorage.Username)
        {
          this.$router.push("/");
        }
        else if(localStorage.UserTypeId == 1)
          this.$router.replace('/player');
        else if(localStorage.UserTypeId == 2)
          this.$router.replace('/professor');
  },
}
</script>
