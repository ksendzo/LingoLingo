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
import GameModeList from './GameModeList'
import QuestionsFrame from './QuestionsFrame'
import ListOfUsers from './ListOfUsers'
export default {
    name:'MainPlayerContent',
    components:{
        GameModeList,
        QuestionsFrame,
        ListOfUsers
    }
}
</script>

