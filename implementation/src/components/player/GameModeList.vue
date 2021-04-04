<template>
    <div>
        <div class = 'row' >
            <div v-for='mode in modes' :key="mode.name" class = "col-4" style = "width:100%">
                <router-link to='/question' class="noHover">
                    <GameModeCard :mode='mode'/>
                </router-link>
            </div>
        </div>
    </div>
</template>


<style>
.noHover {
    color: black;
}

.noHover:hover {
    color: black;
    text-decoration: none;
}

</style>


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

