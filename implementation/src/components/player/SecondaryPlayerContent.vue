<template>
<div style="padding-top:20px">
    <div class="row ">
        <div class="offset-1 col-11 box rangList">
            <router-link to="/player/rangList">
                <h2>Rang List</h2>
            </router-link>
        </div>
    </div>
    <div class="row">
            <div class="offset-1 col-11 box rangList">
                <!--div class="centerContent "-->
                    <h2> {{user.name}}</h2>
                    <br/>
                    <table class="table text-light">
                        <thead>
                            <tr>
                                <th></th>
                                <th>sum</th>
                                <th>basic</th>
                                <th>survival</th>
                            </tr>
                        </thead>
                        <tr v-for="result in results" :key="result.language">
                            
                                <td><img :src='"img/languages/" + result.language + ".png"' width="40" height="30" :alt='result.language'/></td>
                                <td>{{result.basic_score + result.survival_score}}</td>
                                <td>{{result.basic_score}}</td>
                                <td>{{result.survival_score}}</td>
                            </tr>
                    </table>
                <!--/div-->
            </div>
        </div>
</div>  
    
</template>

<style>
.box .table tr {
    width: 100%;
    font-size: 90%;
}


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
import users from '@/data/users.js'

export default {
    name: "SecondaryPlayerContent",
    data() {
        return {
            user: {}, 
            results:[]
        }
    }, 
    mounted:function(){
        this.user = users[1];
        this.results = this.user.results;
    }

}
</script>