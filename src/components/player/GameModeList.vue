<template>
    <div>
        <div class = 'row'>
            <div v-for='mode in modes' :key="mode.name" class = "col-4" style = "width:100%">
            <GameModeCard :mode='mode'/>
            </div>
        </div>
    </div>
</template>


<script>


import GameModeCard from './GameModeCard'
export default {
    name:'GameModeList',
    components:{
        GameModeCard
    },
    data(){
        return {
            modes: [
                {
                    name: "Basic", 
                    text: "This is the Basic mode for playing the game.",
                    picture: "Basic.png"
                    
                },
                {
                    name: "Survival", 
                    text: "Here you can test your limits!", 
                    picture: "Survival.png"
                },
                {
                    name: "Learning", 
                    text: "Keep it calm and learn for fun!", 
                    picture: "Learning.png"
                }
            ]
        }
    }
}
</script>

