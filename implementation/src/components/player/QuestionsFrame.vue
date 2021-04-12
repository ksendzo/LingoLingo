<template>
  <div class="box">
    
    <div class="row">
      <div class="offset-2 col-8">
        <h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</h2>
      </div>
    </div>

    <div class="row">
      <div class="offset-2 col-8  flex-container">
        <input class="fill-width" type="text" placeholder="Answer"/>
      </div>
    </div>

    <div class="row">
      <div class="offset-1 col-2">
        <input type="submit" name="" value="Report" href="#" style="border-color: yellow; :hover background-color: yellow">  
      </div>
      <div class="offset-6 col-2">
        <input v-if="this.isActive" type="submit" name="" value="Check" href="#" @click="toggle" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false">  
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
       Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
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
      isActive: true
    };
  },
  methods: {
    toggle() {
      this.isActive = this.isActive ? false : true;
    }
  }
}


</script>