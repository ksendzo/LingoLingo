<template>
    <div class = "row">
        <div class = "col-12 naslov" id="" >
            <router-link to="/"> <img src="@/assets/logo.png"/> </router-link>
        </div>
    </div>

        
 

</template>

<style>
.naslov a{
    font-weight:bolder;
    text-decoration: none;
    font-size: 200%;
    color: #42b983;
}

.naslov img {
    height: 100px;
}

#traka {
    padding: 10px;
    margin-top:10px;
    background: linear-gradient(to right, transparent, white);
    color: #42b983;
}

#nav {
  padding: 50px;
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
    name: 'Nav', 
    components: {
        
    }
}
</script>