<template>
<div>
<div class = "row" id="">
    <div class = "col-12 naslov">
        <router-link to="/player"> <img src="@/assets/logo.png"/> </router-link>
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
