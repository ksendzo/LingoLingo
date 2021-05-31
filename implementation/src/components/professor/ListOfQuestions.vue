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
              <td style="horizontal-align:middle; margin:0px;">
                <div class="row">
                  <div class="col-12 underline">
                {{ entry.question }}
                  </div></div>
                  <div class="row">
                  <div class="col-12">
                  {{ entry.answer }}
                  </div></div>
              </td>
              <td style="vertical-align: middle;"><img class="languageIcon" src="@/assets/pen.png"/></td>
              <td style="vertical-align: middle;"><img class="languageIcon" src="@/assets/delete.png"/></td>
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

export default {
  name: "ListOfQuestions",
  data() {
      return {
        // users: [
        //     {
        //         language: "German", 
        //         question: "This is a question.", 
        //         answer: "Das ist eine Frage.",
        //         flag: false
        //     },
        //     {
        //         language: "German", 
        //         question: "I don't like styling web pages.", 
        //         answer: "Ich mag es nicht, Webseiten zu stylen.",
        //         flag: false
        //     },
        //     {
        //       language: "German",
        //       question: "But I can sure make it work!", 
        //       answer: "Aber ich kann es sicher schaffen!",
        //       flag: false
        //     },
        //     {
        //         language: "Spanish", 
        //         question: "Hi, how are you?", 
        //         answer: "¿Hola, cómo estás?",
        //         flag: true
            
        //     }
        // ],
        questions: []
      }
  },
  beforeMount() {
    this.getQuestions();
  },
  methods: {
    getQuestions: function() {
      this.$guest.post('/questions')
      .then(res => {
        this.questions = res.data;      
    });
    
    }
  }
};
</script>