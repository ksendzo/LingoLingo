<template>
        <div class="row">
            <div class="offset-1 col-11">
                <div class="card-login">
                    <form @submit.prevent='register()' class="box box-width">
                        <h1>Register</h1>
                        <p class="text-muted"> Please enter your personal info!</p> 
                        <input type="text" name="" placeholder="First Name" v-model="FirstName"> 
                        <input type="text" name="" placeholder="Last Name" v-model="LastName">
                        <input type="text" name="" placeholder="Username" v-model="Username">
                        <input type="text" name="" placeholder="E-mail" v-model="Email">
                        <input type="password" name="" placeholder="Password" v-model="Password"> 
                        <input type="password" name="" placeholder="Confirm Password" v-model="ConfirmPassword">
                        
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
</template>

<script>
export default {
    name: 'RegisterCard',
    data() {
        return {
            FirstName: '',
            LastName: '',
            Username: '',
            Email: '',
            Password: '',
            ConfirmPassword: ''
        };
    },
    methods: {
        register() {
            
        },
    }
}
</script>