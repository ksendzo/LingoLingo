<template>

<div class = "box card-login noHover text-center karticaMod" id="fade" >
  <img class="card-img-top" :src="'/img/'+mode.picture"/>
  <div class="card-body" >  
    <h5 class="card-title ">{{mode.name}}</h5>
    <p class="card-text"> {{mode.text}}</p>

  </div>
</div>

</template>

<style>

.box.karticaMod {
  padding: 10px;
}

.karticaMod {
  height: 100%;
}

</style>


<script>

export default {
    name: 'GameModeCard',
    props: [
      'mode'
    ]
}
</script>