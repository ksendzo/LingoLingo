<!--  Ksenija Bulatovic 2019/0730
      Miloš Ćirković 2017/0333
      Miloš Jovanović 2013/0669 -->

<template>
  <div class="row">
    <div class=" offset-1 col-md-10">
      <div class="centerContent">
        <table class="box table text-white pointer" style="border-top:none;"> 
          <thead>
            <tr>
              <th scope="col">#</th>
              <th v-on:click="sortByName()" scope="col">Name</th>
              <th v-on:click="sortByScore()" scope="col">Score</th>
              <th v-on:click="sortByBasic()" scope="col">Basic Score</th>
              <th v-on:click="sortBySurvival()" scope="col">Survival Score</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(entry, i) in users" :key="i">
              <th scope="row">{{ ++i }}</th>
              <td>{{ entry.player }}</td>
              <td>{{ sum(entry.basic_score , entry.survival_score) }}</td>
              <td>{{ entry.basic_score }}</td>
              <td>{{ entry.survival_score }}</td>
              
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<style> 

.pointer th {
  cursor: pointer;
}

</style>


<script>
// import users from '@/data/users.js'

export default {
  name: "Leaderboard",
  data() {
      return {
        users: [], 
        up: true
      }
  }, 
  methods: {
    sum(a, b) {
      return parseInt(a) + parseInt(b);
    },
    getUserList() {
      this.$player.post('/userList')
      .then(res => {
        this.users = res.data;
        this.up =
        this.sortByScore();
      });
    },
    sortByName() {
      if(this.up){
        this.users.sort((a, b) => (a.player > b.player) ? 1 : -1);
        this.up = false;
      }
      else {
        this.users.sort((a, b) => (a.player > b.player) ? -1 : 1);
        this.up = true;
      }
    },
    sortByScore() {
      if(this.up){
        this.users.sort((a, b) => (this.sum(a.basic_score, a.survival_score) > this.sum(b.basic_score, b.survival_score)) ? 1 : -1);
        this.up = false;
      }
      else {
        this.users.sort((a, b) => (this.sum(a.basic_score, a.survival_score) > this.sum(b.basic_score, b.survival_score)) ? -1 : 1);
        this.up = true;
      }
    },
    sortByBasic() {
      if(this.up){
        this.users.sort((a, b) => (parseInt(a.basic_score) > parseInt(b.basic_score)) ? 1 : -1);
        this.up = false;
      }
      else {
        this.users.sort((a, b) => (parseInt(a.basic_score) > parseInt(b.basic_score)) ? -1 : 1);
        this.up = true;
      }
    },
    sortBySurvival() {
      if(this.up){
        this.users.sort((a, b) => (parseInt(a.survival_score) > parseInt(b.survival_score)) ? 1 : -1);
        this.up = false;
      }
      else {
        this.users.sort((a, b) => (parseInt(a.survival_score) > parseInt(b.survival_score)) ? -1 : 1);
        this.up = true;
      }
    }
  },
  beforeMount() {
    this.getUserList();
  }
};
</script>