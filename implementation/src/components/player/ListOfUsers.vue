<template>
  <div class="row">
    <div class=" offset-1 col-md-10">
      <div class="centerContent">
        <table class="box table text-white" style="border-top:none;"> 
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Score</th>
              <th scope="col">Basic Score</th>
              <th scope="col">Survival Score</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(entry, i) in users" :key="i">
              <th scope="row">{{ ++i }}</th>
              <td>{{ entry.name }}</td>
              <td>{{ getScore(entry.name) }}</td>
              <td>{{ getBasicScore(entry.name) }}</td>
              <td>{{ getSurvivalScore(entry.name) }}</td>
              
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>


<script>
import users from '@/data/users.js'

export default {
  name: "Leaderboard",
  data() {
      return {
        users: users
      }
  }, 
  methods: {
    getScore: function(user) {
      let res = 0;
        this.users.find(obj => {
          return obj.name === user
          }).results.forEach(element => {
          res += element.basic_score + element.survival_score;
        });
        return res;
    }, 
    getBasicScore: function(user){
      let res = 0;
        this.users.find(obj => {
          return obj.name === user
          }).results.forEach(element => {
          res += element.basic_score;
        });
        return res;
    }, 
    getSurvivalScore: function(user){
      let res = 0;
        this.users.find(obj => {
          return obj.name === user
          }).results.forEach(element => {
          res += element.survival_score;
        });
        return res;
    }
  }
};
</script>