<template>

<div class = "card modovi text-center" id="fade">
  <img class="card-img-top" :src="'/img/'+mode.picture"  />
    <div class="card-body"  >  
      <h5 class="card-title">{{mode.name}}</h5>
      <p> {{mode.text}}</p>
    </div>
</div>

</template>

<style>
.modovi {
    height: 327px;
}

/*#fade{
background: linear-gradient(to bottom, transparent, white);
}
*/

</style>


<script>

export default {
    name: 'GameModeCard',
    props: [
      'mode'
    ]
}
</script>