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
                    picture: "lightbulb.png"
                },
                {
                    name: "Survival", 
                    text: "Here you can test your limits!", 
                    picture: "lightbulb.png"
                },
                {
                    name: "Learning", 
                    text: "Keep it calm and learn for fun!", 
                    picture: "lightbulb.png"
                }
            ]
        }
    }
}
</script>

