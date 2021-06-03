<template>
<div>
  <div class="row">
    <div class=" offset-1 col-md-11">
      <div class="centerContent">
        <table class="box table text-white table-borderless">
          <thead>
            <tr>
              <th scope="col">Language</th>
              <th scope="col">Question</th>
              <th scope="col" colspan="3">Options</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(entry, i) in questions" :key="i">
              <td style="vertical-align: middle;">
                <div class="row">
                  <div class="col-12 ">
                    <img class="languageIcon" :src="'/img/languages/'+entry.language+'.png'"/>
                  </div></div>
                  <div class="row">
                  <div class="col-12">
                    {{entry.language}}
                  </div></div>
                
              </td>
              <td v-if="editing == i" style="horizontal-align:middle; margin:0px;">
                <div class="row">
                  <div class="col-12 underline">
                    <input type="text" :value="entry.question" :v-model="question" :id="'editingQ' + i"/>
                  </div></div>
                  <div class="row">
                  <div class="col-12">
                    <input type="text" :value="entry.answer" :id="'editingA' + i"/>
                  </div></div>
              </td>
              <td v-else style="horizontal-align:middle; margin:0px;">
                <div class="row">
                  <div class="col-12 underline">
                {{ entry.question }}
                  </div></div>
                  <div class="row">
                  <div class="col-12">
                  {{ entry.answer }}
                  </div></div>
              </td>
              <td style="vertical-align: middle;" v-if="editing != i" v-on:click="edit(i)" ><img class="languageIcon pointerImg" src="@/assets/pen.png"/></td>
              <td style="vertical-align: middle;"  v-if="editing == i" v-on:click="save(i)" ><img class="languageIcon pointerImg" src="@/assets/save.png"/></td>
              <td style="vertical-align: middle;"><img class="languageIcon pointerImg" src="@/assets/delete.png"/></td>
              <td style="vertical-align: middle;"><img class="languageIcon" :src="'/img/'+entry.flag+'.png'"/></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</template>

<style>

.pointerImg{
  cursor: pointer;
}

.languageIcon{
    height: 20px;
    widows: 20px;
    margin: 5px;
}

.underline{
  border-bottom: 1px solid #2ecc71;
  margin: 0px;
  text-align: center;
}

</style>

<script>
import $ from 'jquery'

export default {
  name: "ListOfQuestions",
  data() {
      return {
        editing: -1,
     
        questions: [],
        question: ''
      }
  },
  beforeMount() {
    this.getQuestions();
  },
  methods: {
    getQuestions: function() {
      this.$professor.post('/questions')
      .then(res => {
        this.questions = res.data.slice().reverse();      
    });
    
    },
    edit: function(i) {
      this.editing = i;
      this.question = this.questions[i].question;
    },
    save(i) {
      let form = {
                'modifiedQuestion': $('#editingQ' + i).val(),
                'modifiedAnswer': $('#editingA' + i).val(),
                'modifiedQuestionId': this.questions[i].IdQuestion
            }

      this.editing = -1;

      this.$professor.post('/ModifyQuestion', form)
      .then( () => {
          this.questions[i].question = form.modifiedQuestion;
          this.questions[i].answer = form.modifiedAnswer;
      })
    }
  }
};
</script>