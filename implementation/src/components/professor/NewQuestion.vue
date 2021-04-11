<template>        
    <div class="row">
        <div class=" col-md-12">
            <div class="card-login">
                <form onsubmit="event.preventDefault()" class="box newQuestion">
                    <div class="row">
                        <div class="col-8 m-10">
                            <h1>New question</h1>
                            <p class="text-muted"> Please enter your new question and answer here:</p>
                        </div>
                        <div class=" col-3">
                        <select style="width:100%;">
                            <option>German</option>
                            <option>Spanish</option>
                        </select>
                        </div>
                    </div>
                    <input type="text" name="" placeholder="Question"> 
                    <input type="text" name="" placeholder="Answer"> 
                    <input type="submit" name="" value="Submit" href="#">                    
                </form>
            </div>
        </div>
    </div>
</template>

<style>
.box.newQuestion {
    border-radius:10px;
    padding: 40px;
    padding-bottom: 10px;
    background: #191919;
    text-align: center;
    transition: 0.25s;
}

.box.newQuestion input[type="text"], 
.box.newQuestion select {
    width: 90%;
}

.box.newQuestion input[type="text"]:focus {
    width: 100%;
}

</style>

<script>
export default {
    name:
    "NewQuestion"
}
</script>