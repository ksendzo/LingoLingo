<template>
  <div class="box">
    <div class="row" v-if="this.gameMode == 'Basic'">
      <div class="offset-10 col-2" >
          <img v-if="fullHeart(3)" src="@/assets/redHeart.png" width="40" height="40">
          <img v-else src="@/assets/pinkHeart.png" width="40" height="40">
          <img v-if="fullHeart(2)" src="@/assets/redHeart.png" width="40" height="40">
          <img v-else src="@/assets/pinkHeart.png" width="40" height="40">
          <img v-if="fullHeart(1)" src="@/assets/redHeart.png" width="40" height="40">
          <img v-else src="@/assets/pinkHeart.png" width="40" height="40">
          <!-- <img src="@/assets/redHeart.png" width="40" height="40">
          <img src="@/assets/redHeart.png" width="40" height="40"> -->
      </div>
    </div>

    <div class="row" v-if="this.gameMode == 'Learning'">
      <div class="offset-1 col-2 red" >
        <input type="submit" name="" value="Finish" href="#" style="border-color: red;">  
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
      <div class="offset-1 col-2 yellow" >
        <input type="submit" name="" value="Report" v-on:click="report()" href="#" style="border-color: yellow; ">  
      </div>
      <div class="offset-6 col-2">
        <input type="submit" value="Check" v-show="answered"  v-on:click="btnClick()" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false"/>  
        <input type="submit" value="Next" v-show="!answered" v-on:click="btnClick()" data-toggle="collapse" data-target="#collapseExample" aria-expanded="true"/>  
      </div>
    </div>

    <div class="row">
      <div v-if="reported" class="offset-1 col-2" style="color: yellow">
        Question Reported
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

.box .red input[type="submit"]:hover  {
  background: red;
}

.box .yellow input[type="submit"]:hover  {
  background: yellow;
}


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
      question: '',
      answer: '', 
      Qid: 0,
      myAnswer: '',
      message: '', 
      hearts: 0, 
      //isCorrectAnswer: false, 
      gameMode: '',
      endGame: false, 
      score: 0,
      reported: false,
      currentQuestionBasic: 0,
      numCorrectAnswers: 0
    };
  },
  methods: {
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
      if(this.endGame || (this.currentQuestionBasic >= 10 && localStorage.mode == 'Basic'))
       {
        if((localStorage.mode == 'Basic' && this.hearts > 0) || localStorage.mode == 'Survival')
        {
          this.saveScore();
        }
        this.$router.replace('/player');
      }
      else 
        this.getNewQuestion();

    },
    checkAnswer() {
      if(this.myAnswer == this.answer || this.myAnswer == "__DEBUG__"){
        this.message = "BRAVO";
        this.isCorrectAnswer = true;
        this.score++;
        this.numCorrectAnswers++;
      }
      else {
        this.message = "Plaky...";
        this.wrongAnswer();
      }
    },
    wrongAnswer() {
      //this.isCorrectAnswer = false;
      let gameType = localStorage.getItem('mode');
      if(gameType == 'Basic')
        this.removeOneHeart();
      if(gameType == 'Survival')
        this.endGame = true; 
    }, 
    removeOneHeart() {
      this.hearts -= 1;
      if(this.hearts <= 0) 
        this.endGame = true;    
    }, 
    getNewQuestion(){
      this.correctAnswer = false;
      this.myAnswer = '';
      this.reported = false;
      let language = localStorage.getItem("language");
      this.$player.post('/question', JSON.stringify({'language':language}))
      .then( res => {
        this.question = res.data.QuestionText;
        this.answer = res.data.AnswerText;
        this.Qid = res.data.IdQuestion;
        this.currentQuestionBasic++;
      });
    }, 
    fullHeart(num) {
      if(this.hearts >= num )
        return true;
        return false;

    },
    saveScore() {
      let form = {
        'gameMode': localStorage.mode,
        'numberOfCorrectAnswers': this.numCorrectAnswers,
        'language': localStorage.language,
        'username': localStorage.Username
      }

      this.$player.post('/SaveScore', form)
      .then( () => {
        
      })
    }, 
    report() {
      this.$player.post('/report', JSON.stringify({'idQ': this.Qid}))
      this.reported = true;
    }
  },
  beforeMount(){
    this.getNewQuestion();
    this.gameMode = localStorage.getItem('mode');
    this.score = 0;
    if(this.gameMode == 'Basic'){
      this.hearts = 3;
      this.basic = true;
    }
  }
}


</script>