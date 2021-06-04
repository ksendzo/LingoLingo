<template>
    <div class="" style="padding:20px">
        <div class = 'row' >
            <div v-for='mode in modes' :key="mode.name" class = "col-4" style = "width:100%" v-on:click="igra(mode.name)">
                <!--router-link to='/question' class="noHover"-->
                    <GameModeCard :mode='mode'  class="noHover"/>
                <!--/router-link-->
            </div>
        </div>
    </div>
</template>


<style>
.okvirKartica {
    border-radius:10px;
    width: 100%;
    height: 400px;
    padding: 40px;
    padding-bottom: 10px;
    background-color: #8a8a8a33;
    text-align: center;
    transition: 0.25s;
    color: white;
}

.noHover {
    color: white;
}

.noHover:hover {
    color: white;
    text-decoration: none;
    background-color: #1cb5db;
}

</style>


<script>


import GameModeCard from './GameModeCard'
export default {
    name:'GameModeList',
    components:{
        GameModeCard
    },
    methods: {
        igra: function(mode) {
            if(localStorage.getItem('language') == '')
                alert('choose a language');
            else {
                localStorage.setItem("mode", mode);
                this.$router.replace('/question');
            }
        }
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

