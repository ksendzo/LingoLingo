<template class="bg-dark">
  <div id="app" >
    <Nav />
    <p>&nbsp;</p> 
    <p>&nbsp;</p> 
    <div class = "row">
      <div class = "col-10 offset-1">
        <router-view/>
      </div>
    </div>
  </div>
</template>

<style>

body {
  background: linear-gradient(to right, transparent, white);
  background-image: url('./assets/traka.jpg');
  background-repeat: no-repeat;
  background-size: 100%;
}


#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}
</style>
<script>
import Nav from './components/Nav'

export default {
  name: 'App',
  components: { Nav}
}

</script>