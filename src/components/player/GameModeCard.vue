<template>

<div class = "card text-center bg-light" id="fade" v-on:click="click">
  <img class="card-img-top" :src="'/img/'+mode.picture"/>
  <div class="card-body">  
    <h5 class="card-title">{{mode.name}}</h5>
    <p class="card-text"> {{mode.text}}</p>
  </div>
</div>

</template>

<style>

.CardMode {
  background-color: maroon imp !important;
}

.modovi {
    height: 370px; /* ovo je problematicno jer posle tekst izlazi iz okvira ako se resize-uje*/
    
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