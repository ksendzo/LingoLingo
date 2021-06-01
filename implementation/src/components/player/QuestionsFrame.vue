<template>
  <div class="box">
    <div class="row" v-if="basic">
      <div class="offset-10 col-2" >
          <img src="@/assets/pinkHeart.png" width="40" height="40">
          <img src="@/assets/redHeart.png" width="40" height="40">
          <img src="@/assets/redHeart.png" width="40" height="40">
      </div>
    </div>
    
    <div class="row">
      <div class="offset-2 col-8">
        <h2> {{question}}</h2>
      </div>
    </div>

    <div class="row">
      <div class="offset-2 col-8  flex-container">
        <input class="fill-width" type="text" placeholder="Answer" v-model="myAnswer"/>
      </div>
    </div>

    <div class="row">
      <div class="offset-1 col-2" >
        <input type="submit" name="" value="Report" href="#" style="border-color: yellow; :hover background-color: yellow">  
      </div>
      <div class="offset-6 col-2">
        <input type="submit" value="Check" v-show="answered"  v-on:click="btnClick()" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false"/>  
        <input type="submit" value="Next" v-show="!answered" v-on:click="btnClick()" data-toggle="collapse" data-target="#collapseExample" aria-expanded="true"/>  
      </div>
    </div>

  <!--ovo prikazuje tacan odgovor nakon pritiska na submit dugme-->
    <div v-show="!answered" class="collapse box" id="collapseExample" style="padding-top:0px;">
      <div class=" card-body">
        {{message}}
      </div>
   </div>
  <!---->

  </div>
</template>

<style>

.box .card-body {
  color: whitesmoke;
}


.CirkovoStilizovanje{
  padding-top: 15px; 
  padding-bottom: 15px;
}

.flex-container {
  display: flex;
}

.fill-width {
  flex: 1;
}

</style>


<script>
export default {
  name:'QuestionFrame',
  data() {
    return {
      answered: true,
      basic: true, 
      question: '',
      answer: '', 
      myAnswer: '',
      message: '', 
      hearts: 0, 
      isCorrectAnswer: false
    };
  },
  methods: {
    getBtnName() {
      if(this.answered)
        return 'Next';
      else
        return 'Check';
    },
    btnClick(){
      if(this.answered){
        this.answered = false;
        this.checkAnswer();
      }
      else {
        this.nextPage();
        this.answered = true;
      }
    },
    nextPage() {
      if(this.isCorrectAnswer)
        this.getNewQuestion();
      else 
        this.$router.replace('/player');
    },
    checkAnswer() {
      if(this.myAnswer == this.answer){
        this.message = "BRAVO";
        this.isCorrectAnswer = true;

      }
      else {
        this.message = "Plaky...";
        this.wrongAnswer();
      }
    },
    wrongAnswer() {
      this.isCorrectAnswer = false;
      let gameType = localStorage.getItem('mode');
      if(gameType == 'Basic')
        this.removeOneHeart();
      if(gameType == 'Survival')
        localStorage.setItem('endGame', 1);
    }, 
    removeOneHeart() {
      this.hearts -= 1;
      if(this.hearts <= 0) 
        localStorage.setItem('endGame', 0);      
    }, 
    getNewQuestion(){
      this.correctAnswer = false;
      this.myAnswer = '';
      let language = localStorage.getItem("language");
      this.$guest.post('/question', JSON.stringify({'language':language}))
      .then( res => {
        this.question = res.data.QuestionText;
        this.answer = res.data.AnswerText;
      });
    }
  },
  beforeMount(){
    this.getNewQuestion();
  }
}


</script>