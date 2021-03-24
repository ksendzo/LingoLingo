<template>
    <div class = "row"> 
        <div class = "col-8">
            <MainPlayerContent/>
        </div>
        <div class = "offset-1 col-3">
            <SecondaryPlayerContent/>
        </div>
    </div>
</template>


<script>
import MainPlayerContent from '../components/MainPlayerContent'
import SecondaryPlayerContent from '../components/SecondaryPlayerContent'

export default {
    name:'PlayerIndex',
    components:{
        MainPlayerContent, 
        SecondaryPlayerContent
    }
}
</script>

