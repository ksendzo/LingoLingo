<template>
<div>
    <NavPlayer/>
    <div class = "row"> 
        <div class="col-2">
            <ChooseLanguage/>
        </div>
        <div class = " col-7">
            <MainPlayerContent/>
        </div>
        <div class = "col-3">
            <SecondaryPlayerContent/>
        </div>
    </div>
</div>
</template>


<script>
import MainPlayerContent from '../components/player/MainPlayerContent'
import SecondaryPlayerContent from '../components/player/SecondaryPlayerContent'
import NavPlayer from '@/components/player/NavPlayer'
import ChooseLanguage from '@/components/ChooseLanguage.vue'

export default {
    name:'PlayerIndex',
    components:{
        MainPlayerContent, 
        SecondaryPlayerContent, 
        NavPlayer, 
        ChooseLanguage
    }
}
</script>

