<template>
    <div class="card" style="padding: 0; margin-top:20px">
        <div class="bs-example">
            <div class="accordion" id="accordionExample">
                <div  v-for='language in languages' :key="language.name">
                    <div class="card card-polje" :id='"polje_" + language.name' role="button" v-on:click="myFunction(language.name)">
                        <div class="card-header" id="headingOne" data-toggle="languageToggle" data-target="#languageToggleOne">
                            {{language.name}}
                            <img :src="'img/' + language.name + '.png'" width="60px" height="40px">
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>    
</template>





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
                    document.getElementById('polje_' + this.languages[i].name).className = "bg-light";
            }
            
            document.getElementById('polje_' + lang).className = "bg-dark text-light";


        }
    }
    
}
</script>
