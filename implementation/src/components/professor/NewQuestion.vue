<template>

<div class="container">
        
        <div class="row">
            <div class="col-md-6">
                <div class="card-login">
                    <form onsubmit="event.preventDefault()" class="box">
                        <h1>New question</h1>
                        <p class="text-muted"> Please enter your new question and answer here:</p>
                        <input type="text" name="" placeholder="Question"> 
                        <input type="text" name="" placeholder="Answer"> 
                        <input type="submit" name="" value="Submit" href="#">                    
                    </form>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
export default {
    name:
    "NewQuestion"
}
</script>