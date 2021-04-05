<template>

  <div class="professor">
<NavProfessor/>
    <p>&nbsp;</p> 
    <p>&nbsp;</p> 

    <h1 style="color:black">Wellcome back professor!</h1>
    <div class="card text-center" style="padding: 0; margin-bottom:50px">
      
      <div class="row CirkovoStilizovanje">
        <div class="offset-2 col-8 text-black card border-0">
          Dodajte novo pitanje:
        </div>
      </div>
      <div class="row CirkovoStilizovanje">
        <div class="offset-2 col-8  flex-container">
          <input class="fill-width" type="text" />
        </div>
      </div>
      <div class="row CirkovoStilizovanje">
        <div class="offset-2 col-8  flex-container">
          <input class="fill-width" type="text" />
        </div>
      </div>
      <div class="row CirkovoStilizovanje">
        <div class="offset-5 col-2">
          <button class="btn btn-success" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false">Submit</button>
        </div>
      </div>
    <!--resetovati gorepomenuta polja u slucaju dodavanja novog pitanja-->
      <div class="collapse" id="collapseExample">
        <div class="card card-body">
        Pitanje zabelezeno!
        </div>
      </div>
    <!---->
    </div>

  <div class="card" style="padding: 0">

        <div class="bs-example">
    <div class="accordion" id="accordionExample">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseOne">
                    
                    Spanish
                    <img src="../../public/img/Spanish.png" width="60px" height="40px">
                    </button>									
                </h2>
            </div>
            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <!--Ovde ide lista igraca-->
                    <ListOfUsers/>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                    <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo">
                        German
                       <img src="../../public/img/German.png" width="60px" height="40px"> 
                        </button>
                </h2>
            </div>
            <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                     <!--Ovde ide lista igraca-->
                     <ListOfUsers/>
                </div>
            </div>
        </div>
        
        <!-- Ovaj deo je za jos jednog igraca, ali treba automatizovati proces!

        <div class="card">
            <div class="card-header" id="headingThree">
                <h2 class="mb-0">
                    <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree">3. What is CSS?</button>                     
                </h2>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">
                    <p>CSS stands for Cascading Style Sheet. CSS allows you to specify various style properties for a given HTML element such as colors, backgrounds, fonts etc. <a href="https://www.tutorialrepublic.com/css-tutorial/" target="_blank">Learn more.</a></p>
                </div>
            </div>
        </div>
        
        
        -->
    </div>
</div>
    
    </div>    



  </div>
</template>

<script>
import ListOfUsers from '../components/player/ListOfUsers';
import NavProfessor from '@/components/professor/NavProfessor'

export default {

  name:'ProfesorPage',
  components:{
    ListOfUsers, NavProfessor

  }
}
</script>
