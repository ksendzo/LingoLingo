<template>
    <div>
    <NavProfessor/>
    <ListOfQuestions/>
    </div>
</template>

<script>
import NavProfessor from '@/components/professor/NavProfessor.vue'
import ListOfQuestions from '@/components/professor/ListOfQuestions.vue'

export default {
    components: {NavProfessor,ListOfQuestions}
}
</script>