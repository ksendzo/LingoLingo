<template>
    <div>

        <GameModeList/>
        <br>
        <div class="row">
            <div class="offset-1 col-10">
                <QuestionsFrame/>
            </div>
        </div>

        <ListOfUsers/>        

    </div>
</template>


<script>
import GameModeList from '../components/player/GameModeList'
import QuestionsFrame from '../components/player/QuestionsFrame'
import ListOfUsers from '../components/player/ListOfUsers'
export default {
    name:'MainPlayerContent',
    components:{
        GameModeList,
        QuestionsFrame,
        ListOfUsers
    }
}
</script>

