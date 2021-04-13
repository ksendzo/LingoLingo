<template>
<div>
    <div class = "row">
        <div class = " offset-1 col-10 naslov" id="" >
            <router-link to="/admin"> 
                <img src="@/assets/logo.png"/>
            </router-link>
        </div>
        <!--div class="col-1 " id="poz"-->
        <button class="logout"> <!--type="submit" name="" value="Log out " href="#"-->
            
            <img src="@/assets/logout.png" width="30" height="30"/>
        </button>
    </div>
    <br/>
    <br/>
</div>
</template>



<script>
export default {
    name: 'NavAdmin'
}
</script>