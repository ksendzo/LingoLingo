<template>
<div>
    <NavPlayer/>
    <div class = "row"> 
        <div class="col-2">
            <ChooseLanguage/>
        </div>
        <div class = " col-7">
            <GameModeList/>
        </div>
        <div class = "col-3">
            <SecondaryPlayerContent/>
        </div>
    </div>
</div>
</template>


<script>
import GameModeList from '../components/player/GameModeList'
import SecondaryPlayerContent from '../components/player/SecondaryPlayerContent'
import NavPlayer from '@/components/player/NavPlayer'
import ChooseLanguage from '@/components/ChooseLanguage.vue'

export default {
    name:'PlayerPage',
    components:{
        GameModeList, 
        SecondaryPlayerContent, 
        NavPlayer, 
        ChooseLanguage
    },
    beforeMount(){
        if(!localStorage.Username)
        {
          this.$router.push("/");
        }
        else if(localStorage.UserTypeId != 1)
        {          
          this.$router.go(-1);
        }
  },
}
</script>

