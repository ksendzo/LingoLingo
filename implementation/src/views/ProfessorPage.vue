<template>

  <div class="professor">
    <NavProfessor/>
    <div class="row">
      <div class="col-6">
        <NewQuestion/>
      </div>
      <div class="col-6">
        <QuestionList/>
      </div>
    </div>
  </div>
</template>

<script>
import NavProfessor from '@/components/professor/NavProfessor'
import NewQuestion from '../components/professor/NewQuestion'
import QuestionList from './QuestionList.vue'
export default {

  name:'ProfesorPage',
  components:{
    NavProfessor,
    NewQuestion,
    QuestionList

  },
  beforeMount(){
        if(!localStorage.Username)
        {
          this.$router.push("/");
        }
        else if(localStorage.UserTypeId != 2)
        {          
          this.$router.go(-1);
        }
  },
}
</script>
