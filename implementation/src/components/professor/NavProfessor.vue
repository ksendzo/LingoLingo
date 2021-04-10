<template>
<div>
<div class = "row" id="">
    <div class = "offset-1 col-1 naslov"  >
        <router-link to="/"> <img src="@/assets/logo3.png"/> </router-link>
    </div>
    <div class="offset-1 col-9">  
        <div class="row">    
            <div class="offset-1 col-2 navTab">
                <router-link to='/professor'> MY PAGE </router-link>
            </div>
            <div class="col-3 navTab">
                <router-link to='/professor/QuestionList'>  QUESTION LIST </router-link>
            </div>
        </div>
    </div>
</div> 
<br/>
</div>
</template>


<script>
export default {
    name: 'NavPrfessor'
}
</script>