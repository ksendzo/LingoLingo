<template>
  <div class="card text-center" style="padding: 0;">
    
    <div class="row CirkovoStilizovanje">
      <div class="offset-2 col-8 text-black card border-0">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
      </div>
    </div>

    <div class="row CirkovoStilizovanje">
      <div class="offset-2 col-8  flex-container">
        <input class="fill-width" type="text" />
      </div>
    </div>

    <div class="row CirkovoStilizovanje">
      <div class="offset-1 col-2">
        <button class="btn btn-warning">Report</button>
      </div>
      <div class="offset-6 col-2">
        <button class="btn btn-success" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false">Submit</button>
      </div>
    </div>

  <!--ovo prikazuje tacan odgovor nakon pritiska na submit dugme-->
    <div class="collapse" id="collapseExample">
      <div class="card card-body">
       Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
      </div>
   </div>
  <!---->

  </div>
</template>

<style>
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
  name:'QuestionFrame'
}
</script>