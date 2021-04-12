<template>
<div>
    <NavAdmin/>
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
        <tr v-for="(entry, i) in questions" :key="entry.name" >
          <div v-if="(i == 0)">
            {{reset()}}
          </div>
          
                <th v-if="entry.flag" scope="row">{{ifInc(entry.flag)}}</th>
                <td v-if="entry.flag"><img class="languageIcon" :src="'/img/languages/'+entry.language+'.png'"/> &emsp;  {{entry.language}}</td>
                <td v-if="entry.flag">{{ entry.question }}</td>
                <td v-if="entry.flag">{{ entry.answer }}</td>
                <td v-if="entry.flag"> 
                    <img class="languageIcon" src="@/assets/delete.png"/>
                </td>
            
        </tr>
      </tbody>
    </table>
  </div>
</div>
</template>


<script>
import questions from '@/data/questions'
import NavAdmin from '../components/admin/NavAdmin.vue'

export default {
  components: { NavAdmin },
    data() {
        return {
            questions: questions,
            number: 0
        }
    }, 
    methods: {
        ifInc: function(flag){
            if(flag) this.number++;
            return this.number;
        },
        reset: function(){
          this.number = 0;
        }
    }
}
</script>