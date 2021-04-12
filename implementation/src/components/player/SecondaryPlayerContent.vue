<template>
<div>
    <div class="row">
        <div class="offset-1 col-11 box rangList">
            <router-link to="/player/rangList">
                <h2>Rang List</h2>
            </router-link>
        </div>
    </div>
    <div class="row">
            <div class="offset-1 col-11">
                <div class="centerContent box rangList">
                    <h2> {{user.name}}</h2>
                    <br/>
                    <table class="table text-light">
                        <div v-for="(language, i) in languages" :key="language">
                            <tr>
                                <td><img :src='"img/languages/" + language.name + ".png"' width="40" height="30" :alt='language.name'/></td>
                                <td>{{i += 50}}</td>
                            </tr>
                        </div>
                    </table>
                </div>
            </div>
        </div>
</div>  
    
</template>

<style>
.box a{
    text-decoration: none;
}
.box a:hover{
    text-decoration: none;
}

.box.rangList {
    padding-top: 20px;
    margin-bottom: 20px;
}


.box h2 {
    color: whitesmoke;
    text-transform: uppercase;
    font-weight: 200;
    font-size: 25px;
}


</style>


<script>
import languages from '@/data/languages.js'

export default {
    name: "SecondaryPlayerContent",
    data() {
        return {
            user: {
                name: "Ana Petrovic"
            }, 
            languages: languages
        }
    }

}
</script>