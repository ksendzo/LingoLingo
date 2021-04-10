<template>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card-login">
                    <form onsubmit="event.preventDefault()" class="box">
                        <h1>Register</h1>
                        <p class="text-muted"> Please enter your personal info!</p> 
                        <input type="text" name="" placeholder="First Name"> 
                        <input type="text" name="" placeholder="Last Name">
                        <input type="text" name="" placeholder="Username">
                        <input type="text" name="" placeholder="E-mail">
                        <input type="password" name="" placeholder="Password"> 
                        <input type="password" name="" placeholder="Confirm Password">
                        
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-outline-success" value="active">Player</button>
                            <button type="button" class="btn btn-outline-success">Professor</button>
                            <button type="button" class="btn btn-outline-success">Admin</button>
                        </div>
                        <input type="submit" name="" value="Register" href="#">
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'RegisterCard'
}
</script>