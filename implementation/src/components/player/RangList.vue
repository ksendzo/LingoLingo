<template>
<div>
<NavPlayer/>
    <p>&nbsp;</p> 
    <p>&nbsp;</p> 
    <ListOfUsers/>
</div>
</template>


<script>
import ListOfUsers from './ListOfUsers'
import NavPlayer from './NavPlayer'

export default {
    name: 'RangList',
    components:{
        ListOfUsers, NavPlayer
    }
}
</script>