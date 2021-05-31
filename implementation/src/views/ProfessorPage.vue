<template>

  <div class="professor">
    <NavProfessor/>
    <div class="row">
      <div class="col-6">
        <NewQuestion/>
      </div>
      <div class="col-6">
        <ListOfQuestions ref="list"/>
      </div>
    </div>
  </div>
</template>

<script>
import NavProfessor from '@/components/professor/NavProfessor'
import NewQuestion from '../components/professor/NewQuestion'
import ListOfQuestions from '@/components/professor/ListOfQuestions.vue'
export default {

  name:'ProfesorPage',
  components:{
    NavProfessor,
    NewQuestion,
    ListOfQuestions
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
  methods: {
    callList: function() {
      this.$refs.list.getQuestions();
    }
  }
}
</script>
