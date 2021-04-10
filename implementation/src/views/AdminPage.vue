<template>
  <div class="admin">
    <NavAdmin/>
    <RequestList/>

  </div>
</template>

<script>
import RequestList from '@/components/admin/RequestList';
import NavAdmin from '@/components/admin/NavAdmin'

export default {

  name:'AdminPage',
  components:{
    RequestList, NavAdmin

  }
}
</script>
