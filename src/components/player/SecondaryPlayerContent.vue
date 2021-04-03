<template>

    <div class="card" style="padding: 0">

        <div class="bs-example">
    <div class="accordion" id="accordionExample">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button type="button" class="btn btn-link noHover" data-toggle="collapse" data-target="#collapseOne">
                    
                    Spanish
                    <img src="../../../public/img/Spanish.png" width="60px" height="40px">
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
                    <button type="button" class="btn btn-link collapsed noHover" data-toggle="collapse" data-target="#collapseTwo">
                        German
                       <img src="../../../public/img/German.png" width="60px" height="40px"> 
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
    
</template>






<script>
import ListOfUsers from './ListOfUsers'


export default {
  components: { ListOfUsers },
    name: "SecondaryPlayerContent",

}
</script>