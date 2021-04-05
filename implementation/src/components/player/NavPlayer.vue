<template>
<div>
<div class = "row" id="">
    <div class = "offset-1 col-1 naslov">
        <router-link to="/"> <img src="@/assets/logo3.png"/> </router-link>
    </div>
    <div class="offset-1 col-9"  v-if="userType = 'player'">    
        <div class="row">    
            <div class="offset-1 col-2 navTab">
                <router-link to='/player'> MY PAGE </router-link>
            </div>
            <div class="col-2 navTab">
              <router-link to='/player/rangList'>  RANG LIST </router-link>
            </div>
        </div>
    </div>
</div>
<br/>
</div>
</template>

<style>
.navTab {
  list-style-type: none;
  margin: 0;
  padding: 40px;
  font-size: 20px;
  color: rgb(73, 180, 216);
  font-weight: bolder;
  font-family: Apple Chancery, cursive	;
  }

  .navTab a{
    list-style-type: none;
    color: rgb(73, 180, 216)
  }

  .navTab a:hover {
    list-style-type: none;
    color: rgb(73, 180, 216);
    text-decoration: none;
  }



</style>


<script>
export default {
    name: 'NavPlayer'
}
</script>
