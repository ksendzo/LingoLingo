<template>
  <div class="container">
    <table class="table mt-5 table-dark">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Score</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(entry, i) in users" :key="i">
          <th scope="row">{{ ++i }}</th>
          <td>{{ entry.name }}</td>
          <td>{{ entry.score }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  name: "Leaderboard",
  data() {
      return {
        users: [
            {
            name: "Alex",
            score: 123
            },
            {
                name: "Anna", 
                score: 57
            }
        ]
      }
  }
};
</script>