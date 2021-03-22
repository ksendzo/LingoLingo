<template>
    <div class = "comp">
        <div class="row">
            <div class= "col-6">
                Something
            </div>
            <div class="col-6 dugme">
                <button class="btn btn-success">
                    klikni me
                </button>
            </div>
        </div>
        Player Index Page
    </div>
</template>

<style>
.dugme {
    padding: 20px;
    vertical-align: middle im !important;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 50px;
}
.comp {
    
    border-radius: 25px;
    border: 2px solid lightgray;

}

.btn {
    background-color: #42b983;
}
</style>


<script>
export default {
    name:'PlayerIndex'
}
</script>

