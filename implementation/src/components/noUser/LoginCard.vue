<template>
        <div class="row">
            <div class="offset-1 col-11">
                <div class="centerContent">
                    <form @submit.prevent='login()' class="box box-width">
                        <h1>Login</h1>
                        <p class="text-muted"> Please enter your login and password!</p>
                        <input type="text" name="" placeholder="Username" v-model="username"> 
                        <input type="password" name="" placeholder="Password" v-model="password"> 
                        <a class="forgot text-muted" href="#">Forgot password?</a>
                        <input type="submit" name="" value="Login" href="#">                    
                    </form>
                </div>
            </div>
        </div>
</template>

<script>
export default {
    data() {
        return {
            username: '',
            password: ''
        };
    },
    beforeMount(){
            localStorage.clear();
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
                        alert("Error! Incorrect account type");
                    }
                }
                else
                {
                    alert(JSON.stringify(res.data.Message));
                }
            })
            .catch(err => {
                this.msg = err.response.data.message.console.error();
                alert("Unknown error");
            })
            //axios



            //console.log('login attempted');
        }
    }
}
</script>