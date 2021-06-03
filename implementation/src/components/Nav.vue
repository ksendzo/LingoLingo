<template>
    <div class = "row">
        <div class = " offset-1 col-10 naslov" id="" >
            <router-link to="/"> 
                <img src="@/assets/logo.png"/>
            </router-link>
        </div>
        <!--div class="col-1 " id="poz"-->
        
    </div>
</template>

<style>


.logout  {
    background-color: Transparent;
    background-repeat:no-repeat;
    border: none;
    cursor:pointer;
    overflow: hidden;
    outline:none;
    height: 50px;
    margin-top: 30px;

}

.logout:hover{
    background: #3498db;
    border-radius: 20px;
    
}

#poz {
    background: transparent;
    padding:0px;
}

#poz button{
    border-radius:10px;
    padding: 40px;
    padding-bottom: 10px;
    background: #191919;
    text-align: center;
    transition: 0.25s;
    align-content:right; 

    border: 0;
    background: none;
    display: block;
    margin: 20px auto;
    text-align: center;
    border: 2px solid #3498db;
    padding: 10px 10px;
    outline: none;
    color: white;
    border-radius: 24px;
    transition: 0.25s;
    width: 200px;

    background:#191919;
    border: 2px solid #3498db;
}
#poz button:hover{

    background: #3498db;
}

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