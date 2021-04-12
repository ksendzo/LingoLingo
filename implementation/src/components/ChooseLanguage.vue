<template>
    <div class="" style="padding: 0; margin-top:20px">
        <div  v-for='language in languages' :key="language.name">
            <div class="chooseLanguage chooseLanguage-notSelected " :id='"polje_" + language.name' role="button" v-on:click="myFunction(language.name)">
                <div class=" borderless" style="">
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
    padding: 2px;
    background: #191919;
    text-align: center;
    transition: 0s;
    color: whitesmoke;
    margin-left: 5%;
    margin-bottom: 1px;
    margin-top: 1px;
    border: 2px solid #191919;
    height: 102%;
}

.chooseLanguage.chooseLanguage-selected {
    margin-left: 0px;
    width: 105%;
    border: 2px solid silver;
}

.chooseLanguage:hover {
    margin-left: 0px;
    width: 105%;
}

</style>


<script>

export default {
    name: 'ChooseLanguage',
    data() {
        return {
            languages: [
                {name: "German"}, 
                {name: "Spanish"},
                {name: "French"},
                {name: "Russian"},
                {name: "Italian"}
            ],
        selected: "German"
        }
    }, 
    methods: {
        myFunction: function(lang){
            for(let i = 0; i < this.languages.length; i++){
                if(lang.localeCompare(this.languages[i].name) != 0)
                    document.getElementById('polje_' + this.languages[i].name).className = " chooseLanguage chooseLanguage-notSelected";
            }
            
            document.getElementById('polje_' + lang).className = "chooseLanguage chooseLanguage-selected ";


        }
    }
    
}
</script>
