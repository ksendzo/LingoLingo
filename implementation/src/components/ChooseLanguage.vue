<template>
    <div class="" style="padding: 0; margin-top:20px">
        <div  v-for='language in languages' :key="language.LanguageName">
            <div class="chooseLanguage chooseLanguage-notSelected " :id='"polje_" + language.LanguageName' role="button" v-on:click="myFunction(language.LanguageName)">
                <div class=" borderless" style="">
                    <div class="row">
                        <div class="offset-1 col-4" style="text-align:right">
                        <img :src="'img/languages/' + language.LanguageName + '.png'" width="60px" height="40px">
                        </div>
                        <div class="offset-1 col-6" style="text-align:left; padding-top:5px">
                        {{language.LanguageName}}
                        </div>
                    </div>
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
            languages: [ ],
        selected: "German"
        }
    }, 
    
    methods: {
        myFunction: function(lang){
            this.graphicSelect(lang);
            localStorage.setItem("language", lang);

        },
        graphicSelect: function(lang){
            for(let i = 0; i < this.languages.length; i++){
                if(lang.localeCompare(this.languages[i].LanguageName) != 0)
                    if(document.getElementById('polje_' + this.languages[i].LanguageName) != null)
                        document.getElementById('polje_' + this.languages[i].LanguageName).className = " chooseLanguage chooseLanguage-notSelected";
            }
            if(document.getElementById('polje_' + lang) != null)
                document.getElementById('polje_' + lang).className = "chooseLanguage chooseLanguage-selected ";
        }
    },
    beforeMount() {
        this.$guest.post('/languages')
        .then(res => {
            this.languages = res.data;
        });
        if(localStorage.getItem('language') == null)
            localStorage.setItem('language', 'Italian');
    },
    mounted() {
        this.myFunction(localStorage.getItem('language'));
    }
    
}
</script>
