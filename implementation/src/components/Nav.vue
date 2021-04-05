<template>
<div>
    <div class = "row" id="">

        <div class = "offset-1 col-1 naslov" id="" >
            <router-link to="/"> <img src="@/assets/logo3.png"/> </router-link>
        </div>
        <div class="offset-1 col-9">  
        <div class="row">    
            <div class="offset-1 col-2 navTab">
                <router-link to='/login'> LOGIN </router-link>
            </div>
            <div class="col-3 navTab">
                <router-link to='/register'>  REGISTER </router-link>
            </div>
        </div>
    </div>

        
    </div>
    <br/>
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