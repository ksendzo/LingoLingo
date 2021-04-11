<template>
<div>
    <Nav/>
    <register-card/>
    <div class = "parolaSnadjiSe">
    </div>   
</div>
</template>

<script>
import Nav from '@/components/Nav.vue'
import RegisterCard from '../components/noUser/RegisterCard.vue'

export default {
    components: {Nav, RegisterCard},
    data() {
        return {
            brNum: 30
        }
    }
}
</script>