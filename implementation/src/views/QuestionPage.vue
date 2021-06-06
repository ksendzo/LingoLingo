<!--  Ksenija Bulatovic 2019/0730
      Miloš Ćirković 2017/0333 -->

<template>
    <div>
        <NavPlayer/>
        <p>&nbsp;</p> 
    <p>&nbsp;</p> 
        <QuestionsFrame/>
    </div>
</template>


<script>
import QuestionsFrame from '@/components/player/QuestionsFrame.vue'
import NavPlayer from '@/components/player/NavPlayer'

export default {
    name: 'QuestionPage', 
    components: {
        QuestionsFrame, NavPlayer
    }
}
</script>

