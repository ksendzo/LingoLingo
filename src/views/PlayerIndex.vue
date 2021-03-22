<template>
 
    <div class = "">

        <div class = 'row'>
            <div class = "col-4">
            <GameModeCard/>
            </div>

            <div class = "col-4">
            <GameModeCard/>
            </div>


            <div class = "col-4">
            <GameModeCard/>
            </div>
        </div>
    </div>


</template>

<style>
.dugme {
    padding: 20px;
    vertical-align: middle im !important;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 50px;
}
.comp {
    background: #d4d4d493;
    border-radius: 25px;
    border: 2px solid #42b983;

}

.btn {
    background-color: #42b983;
}
</style>


<script>


import GameModeCard from '../components/GameModeCard'
export default {
    name:'PlayerIndex',
    components:{
    GameModeCard
    }
}
</script>

