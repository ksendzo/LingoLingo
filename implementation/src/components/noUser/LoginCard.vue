<template>
        <div class="row">
            <div class="offset-1 col-11">
                <div class="centerContent">
                    <form @submit.prevent='login()' class="box box-width">
                        <h1>Login</h1>
                        <p class="text-muted"> Please enter your login and password!</p>
                        <input type="text" name="" placeholder="Username" v-model="username"> 
                        <input type="password" name="" placeholder="Password" v-model="password"> 
                        <input type="submit" name="" value="Login" href="#">   
                        <p v-if="this.error" class="errorMsg"> {{errorMessage}} </p>                 
                    </form>
                </div>
            </div>
        </div>
</template>

<style>
    .errorMsg {
        color: rgb(226, 27, 27);
    }
    .successMsg {
        color: green;
    }
</style>


<script>
export default {
    data() {
        return {
            username: '',
            password: '',
            error: false,
            errorMessage: ''
        };
    },
    
    methods: {
        login()
        {   
            let form = {
                'username': this.username,
                'password': this.password
            }
            
            this.$guest.post('/login', JSON.stringify(form))
            .then( res => {
                if(res.data.LoginSuccessful == true)
                {
                    let userFullName = String(res.data.FirstName) + " " + String(res.data.LastName);
                    let userAccountTypeId = res.data.UserTypeId;

                    localStorage.setItem("UserFullName", userFullName);
                    localStorage.setItem("Username", res.data.Username);
                    localStorage.setItem("UserTypeId", userAccountTypeId);

                    if(userAccountTypeId == 1)
                    {
                        this.$router.push('/player');
                    }
                    else if(userAccountTypeId == 2)
                    {
                        this.$router.push('/professor');
                    }
                    else if(userAccountTypeId == 3)
                    {
                        this.$router.push('/admin');
                    }
                    else
                    {
                        this.errorMessage = "Error! Incorrect account type";
                        this.error = true;
                    }
                }
                else
                {
                    this.errorMessage = res.data.Message;
                    this.error = true;
                }
            })
            .catch(err => {
                this.msg = err.response.data.message.console.error();
                this.errorMessage = "Unknown error";
                this.error = true;
            })
            //axios



            //console.log('login attempted');
        }
    }
}
</script>