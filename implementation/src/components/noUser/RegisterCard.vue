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
                        

                        <!--div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-outline-success" v-on:click="btnClick('player')" id="player">Player</button>
                            <button type="button" class="btn btn-outline-success" v-on:click="btnClick('professor')" id="professor">Professor</button>
                            <button type="button" class="btn btn-outline-success" v-on:click="btnClick('admin')" id="admin">Admin</button>
                        </div-->

                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-outline-success" v-on:click="btnClick('Player')" id="player">Player</button>
                            <button type="button" class="btn btn-outline-success" v-on:click="btnClick('Professor')" id="professor">Professor</button>
                            <button type="button" class="btn btn-outline-success" v-on:click="btnClick('Administrator')" id="admin">Admin</button>
                        </div>


                        <input type="submit" name="" value="Register" href="#">
                        <p v-if="this.error" class="errorMsg"> {{errorMessage}} </p> 
                        <p v-if="this.success" class="successMsg"> {{errorMessage}} </p> 
                    </form>
                </div>
            </div>
        </div>
</template>

<script>
import $ from 'jquery'

export default {
    name: 'RegisterCard',
    data() {
        return {
            FirstName: '',
            LastName: '',
            Username: '',
            Email: '',
            Password: '',
            ConfirmPassword: '', 
            playerType: '',
            error: false,
            success: false,
            errorMessage: ''
        };
    },
    methods: {
        btnClick(elem) {
            this.playerType = elem;
            if(elem == 'Player'){
                $('#player').removeClass('btn-outline-success').addClass('btn-success');
                $('#professor').removeClass('btn-success').addClass('btn-outline-success');
                $('#admin').removeClass('btn-success').addClass('btn-outline-success');
            }
            if(elem == 'Professor'){
                $('#player').removeClass('btn-success').addClass('btn-outline-success');
                $('#professor').removeClass('btn-outline-success').addClass('btn-success');
                $('#admin').removeClass('btn-success').addClass('btn-outline-success');
            }
            if(elem == 'Administrator'){
                $('#player').removeClass('btn-success').addClass('btn-outline-success');
                $('#professor').removeClass('btn-success').addClass('btn-outline-success');
                $('#admin').removeClass('btn-outline-success').addClass('btn-success');
            }
        },
        register() {
            let form = {
                'FirstName': this.FirstName,
                'LastName': this.LastName,
                'Username': this.Username,
                'Email': this.Email,
                'Password': this.Password,
                'ConfirmPassword': this.ConfirmPassword,
                'AccountType': this.playerType
            }

            this.$guest.post('/register', JSON.stringify(form))
            .then( res => {
                    this.errorMessage = res.data.Message;
                    if(res.data.RegisterSuccessful)
                    {
                        this.success = true;
                        this.error = false;
                        this.FirstName = '';
                        this.LastName = '';
                        this.Username = '';
                        this.Email = '';
                        this.Password = '';
                        this.ConfirmPassword = '';
                        this.playerType = '';
                        $('#player').removeClass('btn-success').addClass('btn-outline-success');
                        $('#professor').removeClass('btn-success').addClass('btn-outline-success');
                        $('#admin').removeClass('btn-success').addClass('btn-outline-success');
                    }
                    else {
                        this.error = true;
                        this.success = false;
                    }
            })
            .catch(err => {
                this.msg = err.response.data.message.console.error();
                this.errorMessage = "Unknown error";
                this.error = true;
            })

        },
    }
}
</script>