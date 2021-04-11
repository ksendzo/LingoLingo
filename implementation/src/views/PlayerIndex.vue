<template>
<div>
    <NavPlayer/>
    <div class = "row"> 
        <div class="col-2">
            <ChooseLanguage/>
        </div>
        <div class = " col-8">
            <MainPlayerContent/>
        </div>
        <div class = "col-2">
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

