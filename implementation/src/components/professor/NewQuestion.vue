<template>        
    <div class="row">
        <div class=" col-md-12">
            <div class="card-login">
                <form onsubmit="event.preventDefault()" @submit.prevent='newQuestion()' class="box newQuestion">
                    <div class="row">
                        <div class="col-8 m-10">
                            <h1>New question</h1>
                            <p class="text-muted"> Please enter your new question and answer here:</p>
                        </div>
                        <div class=" col-3">
                        <select style="width:100%;" v-model="selectedLanguage">
                                 <option v-for="language in languages" :value='language' :key="language.LanguageName">{{language.LanguageName}}</option>
                        </select>
                        </div>
                    </div>
                    <input type="text" name="" placeholder="Question" v-model="question"> 
                    <input type="text" name="" placeholder="Answer" v-model="answer"> 
                    <input type="submit" name="" value="Submit" href="#">                    
                    <p v-if="this.error" class="errorMsg"> {{errorMessage}} </p>                   
                </form>
            </div>
        </div>
    </div>
</template>

<style>

.box.newQuestion select option {
    background-color: #191919;
    color: whitesmoke;
    
}


.box.newQuestion {
    border-radius:10px;
    padding: 40px;
    padding-bottom: 10px;
    background: #191919;
    text-align: center;
    transition: 0.25s;
}

.box.newQuestion input[type="text"], 
.box.newQuestion select {
    width: 90%;
}

.box.newQuestion input[type="text"]:focus {
    width: 100%;
}

</style>

<script>
export default {
    name: "NewQuestion",
    data() {
        return {
            languages: [],
            selectedLanguage: '',
            question: '',
            answer: '',
            professor: '',
            error: false,
            errorMessage: 'Please fill all the fields.'
        };
    },
    beforeMount(){
        this.professor = localStorage.getItem('Username');
        this.$professor.post('/languages')
        .then(res => {
            this.languages = res.data;
        });
    },
    methods: {
        newQuestion() {
            if(this.selectedLanguage == '')
            {
                this.errorMessage = 'Please select the language.'
                this.error = true;
            }
            else if(this.question == '' || this.answer == '')
            {
                this.errorMessage = 'Please fill all the fields.'
                this.error = true;
            }
            else 
            {
                this.error = false;
                let form = {
                    'language': this.selectedLanguage.LanguageName,
                    'question': this.question,
                    'answer': this.answer,
                    'professor': this.professor
                }

                this.$professor.put('/newQuestion', JSON.stringify(form))
                .then( () => {
                    this.$router.replace('/professor');

                    this.question = '';
                    this.answer = '';
                    this.$parent.callList();
                })

            }
        }
    }
}
</script>