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
    methods: {
        login()
        {   
            let form = {
                'username': this.username,
                'password': this.password
            }
            
            this.$guest.post('/login', JSON.stringify(form))
            .then( res => {
                alert(res.data.Username);
                let user = {name: res.data.FirstName + " " + res.data.LastName};

                localStorage.setItem("user", JSON.stringify(user));

                this.$router.push('/player');

                res.data;
            })
            .catch(err => {
                this.msg = err.response.data.message.console.error();
                alert("Greska");
            })
            //axios



            //console.log('login attempted');
        }
    }
}
</script>