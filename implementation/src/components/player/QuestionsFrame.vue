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
        <input v-if="this.isActive" type="submit" name="" value="Check" href="#" @click="checkAnswer" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false">  
        <!--button v-if="this.isActive" class="btn btn-success toggle" @click="toggle" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false">
          Check
        </button-->
        <router-link to='/player' v-else>
        <input type="submit" name="" value="Next" href="#">  
        </router-link>
      </div>
    </div>

  <!--ovo prikazuje tacan odgovor nakon pritiska na submit dugme-->
    <div class="collapse box" id="collapseExample" style="padding-top:0px;">
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
      isActive: true,
      basic: true, 
      question: '',
      answer: '', 
      myAnswer: '',
      message: ''
    };
  },
  methods: {
    toggle() {
      this.isActive = this.isActive ? false : true;
    },
    checkAnswer() {
      this.toggle();
      if(this.myAnswer == this.answer)
        this.message = "BRAVO";
      else 
        this.message = "Plaky...";
    }
  },
  beforeMount(){
      let language = localStorage.getItem("language");
    //  alert(language);
      this.$guest.post('/question', JSON.stringify({'language':language}))
      .then( res => {
        this.question = res.data.QuestionText;
        this.answer = res.data.AnswerText;
      });
  }
}


</script>