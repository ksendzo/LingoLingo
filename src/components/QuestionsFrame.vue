<template>
  <div class="QuestionsFrame">
      <div class="row" style="padding-top: 15px; padding-bottom: 15px;">
          <div class="offset-2 col-8 offset-2 question">
            <form>
        <label for="fname">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</label>
            </form>
          </div>
      </div>

      <div class="row  " style="padding-top: 15px; padding-bottom: 15px;">
          <div class="offset-1 col-4 answer">
              <form>
        <input type="text" size="100%">
             </form>
          </div>
      </div>

      <div class="row" style="padding-top: 15px; padding-bottom: 15px;">
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
.QuestionsFrame{
margin-top: 15px; /*Ovo je samo za test na glavnoj strani*/
background-color: darkolivegreen;

}
.question{
background-color: darkorange;
}

.answer{
  padding-left: 10px;
  justify-content:left;
  width:fit-content;
}

</style>


<script>
export default {
  name:'QuestionFrame'
}
</script>