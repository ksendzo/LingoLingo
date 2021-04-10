<template>
  <div class="container">
    <table class="table mt-5 table-dark">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Language</th>
          <th scope="col">Question</th>
          <th scope="col">Answer</th>
          <th scope="col">Options</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(entry, i) in users" :key="i">
          <th scope="row">{{ ++i }}</th>
          <td><img class="languageIcon" :src="'/img/'+entry.language+'.png'"/> &emsp;  {{entry.language}}</td>
          <td>{{ entry.question }}</td>
          <td>{{ entry.answer }}</td>
          <td> 
            <img class="languageIcon" src="@/assets/pen.png"/>
            <img class="languageIcon" src="@/assets/delete.png"/>
            <img class="languageIcon" :src="'/img/'+entry.flag+'.png'"/> 
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<style>
.languageIcon{
    height: 20px;
    widows: 20px;
    margin: 5px;
}
</style>

<script>
export default {
  name: "ListOfQuestions",
  data() {
      return {
        users: [
            {
                language: "German", 
                question: "This is a question.", 
                answer: "Das ist eine Frage.",
                flag: false
            },
            {
                language: "German", 
                question: "This is a questioa ef w fsgfsg hdfgddd   dfg gd gdgdfaf  ksjakdgf hagodhk atyj sdidoks gh  ouikda6 a a7dkyid t7ta n.", 
                answer: "Das ist ein sdjsfj sfj sudshfsufhsdfh e u h ahuhsdsudhf suu sufjsuss  jkjhjzjcs shysbra d rgrh cgdhdthdgdtgdt  dgdg xdftsre Frage.",
                flag: false
            },
            {
                language: "Spanish", 
                question: "Hi, how are you?", 
                answer: "¿Hola, cómo estás?",
                flag: true
            
            }
        ]
      }
  }
};
</script>