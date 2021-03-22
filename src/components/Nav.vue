<template>
    <div class = "row" id="traka">

        <div class = "offset-1 col-1" id="naslov" >
            <router-link to="/">LingoLingo</router-link>
        </div>
        <div class="offset-8 col-1 sredina" id = "nav">
            <router-link to="/">PlayerIndex</router-link> |
            <router-link to="/about">About</router-link>
        </div>
        
    </div>
</template>

<style>
#naslov a{
    font-weight:bolder;
    text-decoration: none;
    font-size: 200%;
    color: #42b983;
}

#traka {
    padding: 20px;
    background: lightgray;
    color: #42b983;
}

#nav {
  padding: 20px;
  background: lightgray;
  vertical-align: middle im !important;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 50px;
}

#nav a {
  font-weight: bold;
  color: #2c3e50;
  
}

#nav a.router-link-exact-active {
  color: #42b983;
}
</style>

<script>
export default {
    name: 'Nav'
}
</script>