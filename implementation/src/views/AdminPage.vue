<template>
  <div class="admin">
    <NavAdmin/>
    <h1 style="color:black">Hello Admin! Welcome back!</h1>

<div>
    <h3 style="color: #42b983;">Zahtevi za poziciju admina/profesora:</h3>
    <ListOfUsers/>
</div>

<div>
    <h3 style="color: #42b983;">Lista prijavljenjih pitanja</h3>
    <ListOfUsers/>
</div>


  </div>
</template>

<script>
import ListOfUsers from '../components/player/ListOfUsers';
import NavAdmin from '@/components/admin/NavAdmin'

export default {

  name:'AdminPage',
  components:{
    ListOfUsers, NavAdmin

  }
}
</script>
