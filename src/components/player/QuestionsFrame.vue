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
        <button class="btn btn-success">Submit</button>
      </div>
    </div>

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