<template>

<div class = "card text-center">
  <img class="card-img-top" :src="'/img/'+mode.picture"  />
    <div class="card-body">  
      <h5 class="card-title">{{mode.name}}</h5>
      <p> {{mode.text}}</p>
    </div>
</div>

</template>


<script>

export default {
    name: 'GameModeCard',
    props: [
      'mode'
    ]
}
</script>