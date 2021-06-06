<!--  Ksenija Bulatovic 2019/0730
      Miloš Ćirković 2017/0333
      Miloš Jovanović 2013/0669 -->

<template>
<div>
    <NavAdmin/>
  <div class="row">
    <div class=" offset-1 col-md-10">
      <div class="centerContent">
        <table class="box table text-white table-borderless">      <thead>
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Language</th>
                <th scope="col">Question</th>
                <th scope="col">Answer</th>
                <th scope="col">Options</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="question in questions" :key="question.IdQuestion" v-bind:id="question.IdQuestion" >
                <td>
                  {{question.IdQuestion}}
                </td>
                <td><img class="languageIcon" :src="'/img/languages/'+question.Language+'.png'"/> &emsp;  {{question.Language}}</td>
                <td>{{ question.Question }}</td>
                <td>{{ question.Answer }}</td>
                <td>
                    <img class="languageIcon pointerImg" src="@/assets/delete.png" v-on:click="deleteQuestion(question.IdQuestion)">
              
                </td>    
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</template>


<script>
import NavAdmin from '../components/admin/NavAdmin.vue'

export default {
  components: { NavAdmin },
    data() {
        return {
            questions: []
        }
    }, 
    beforeMount() {
        if(!localStorage.Username)
        {
          this.$router.push("/");
        }
        else if(localStorage.UserTypeId == 1)
          this.$router.replace('/player');
        else if(localStorage.UserTypeId == 2)
          this.$router.replace('/professor');

      this.$admin.post('/getFlaggedQuestions')
      .then( res => {
        this.questions = res.data;
          })
      .catch(err => {
              this.msg = err.response.data.message.console.error();
              alert("Unknown error");
          })
    },
    methods: {
      deleteQuestion: function(idQuestion) {
        let form = {
          'IdQuestion': idQuestion
        }

        this.$admin.post('/deleteQuestion', JSON.stringify(form))
        .then( () => {
          this.$router.go(0);
        })
        .catch(err => {
          this.msg = err.response.data.message.console.error();
          alert("Unknown error");
        })
      }          
      
    }
}
</script>