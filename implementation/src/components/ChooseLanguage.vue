<template>
    <div class="" style="padding: 0; margin-top:20px">
        <div  v-for='language in languages' :key="language.name">
            <div class="chooseLanguage chooseLanguage-notSelected noHover" :id='"polje_" + language.name' role="button" v-on:click="myFunction(language.name)">
                <div class=" borderless" style="border-radius:10px;">
                    {{language.name}}
                    <img :src="'img/' + language.name + '.png'" width="60px" height="40px">
                </div>
            </div>
        </div>
    </div>    
</template>


<style >
.chooseLanguage{
    border-radius:10px;
    /*padding: 40px;*/
    padding: 10px;
    background: #191919;
    text-align: center;
    transition: 0s;
    color: white;
    margin-left: 10%;
}

.chooseLanguage-selected {
/*    border: 4px solid #45d4f8;*/
border: none;
    margin-left: 0px;
    width: 110%;
    height: 110%;
    
}


</style>


<script>

export default {
    name: 'ChooseLanguage',
    data() {
        return {
            languages: [
                {name: "German"}, 
                {name: "Spanish"}
            ],
        selected: "German"
        }
    }, 
    methods: {
        myFunction: function(lang){
            for(let i = 0; i < this.languages.length; i++){
                if(lang.localeCompare(this.languages[i].name) != 0)
                    document.getElementById('polje_' + this.languages[i].name).className = "noHover chooseLanguage chooseLanguage-notSelected";
            }
            
            document.getElementById('polje_' + lang).className = "chooseLanguage chooseLanguage-selected noHover";


        }
    }
    
}
</script>
