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
                <td><img class="languageIcon" :src="'/img/languages/'+question.language+'.png'"/> &emsp;  {{question.language}}</td>
                <td>{{ question.question }}</td>
                <td>{{ question.answer }}</td>
                <td>
                    <img class="languageIcon" src="@/assets/delete.png" v-on:click="deleteQuestion(question.IdQuestion)">
              
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
            questions: [
              {
                IdQuestion: 1,
                language: "German",
                question: "Wie geht's?",
                answer: "Kurcina"
              }

            ],
        }
    }, 
    methods: {
      deleteQuestion: function(idQuestion) {
          alert(idQuestion);
      }          
      
    }
}
</script>