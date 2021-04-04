<template>
<div>
    <NavPlayer/>
    

    <div class = "row"> 
        <div class = "col-8">
            <MainPlayerContent/>
        </div>
        <div class = "offset-1 col-3">
            <SecondaryPlayerContent/>
        </div>
    </div>
</div>
</template>


<script>
import MainPlayerContent from '../components/player/MainPlayerContent'
import SecondaryPlayerContent from '../components/player/SecondaryPlayerContent'
import NavPlayer from '@/components/player/NavPlayer'

export default {
    name:'PlayerIndex',
    components:{
        MainPlayerContent, 
        SecondaryPlayerContent, 
        NavPlayer
    }
}
</script>

