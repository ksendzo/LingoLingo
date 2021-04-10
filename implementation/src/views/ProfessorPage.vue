<template>

  <div class="professor">
    <NavProfessor/>

    <NewQuestion/>

  </div>
</template>

<script>
import NavProfessor from '@/components/professor/NavProfessor'
import NewQuestion from '@/components/professor/NewQuestion'
export default {

  name:'ProfesorPage',
  components:{
    NavProfessor,
    NewQuestion

  }
}
</script>
