<!--  Ksenija Bulatovic 2019/0730
      Miloš Ćirković 2017/0333
      Miloš Jovanović 2013/0669 -->
      
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


<style>

.centerContent{
    justify-content: center;
}

.box-width {
    width: 500px; 
}

.box {
    border-radius:10px;
    padding: 40px;
    padding-bottom: 10px;
    background: #191919;
    text-align: center;
    transition: 0.25s;
}

.box input[type="text"],
.box input[type="password"],
.box select, 
.box section option {
    border: 0;
    background: none;
    display: block;
    margin: 20px auto;
    text-align: center;
    border: 2px solid #3498db;
    padding: 10px 10px;
    outline: none;
    color: white;
    border-radius: 24px;
    transition: 0.25s;
    width: 200px;
}

.box h1 {
    color: white;
    text-transform: uppercase;
    font-weight: 500
}

.box input[type="text"]:focus,
.box input[type="password"]:focus, 
.box select:focus, 
.box option:focus {
    border-color: #2ecc71;
    width: 250px;
}

.box button[type="button"]:active{
    box-shadow: 0 5px #666;
    transform: translateY(4px);
}

.box input[type="submit"] {
    border: 0;
    background: none;
    display: block;
    margin: 20px auto;
    text-align: center;
    border: 2px solid #2ecc71;
    padding: 14px 40px;
    outline: none;
    color: white;
    border-radius: 24px;
    transition: 0.25s;
    cursor: pointer
}

.box input[type="submit"]:hover {
    background: #2ecc71
}

.forgot {
    text-decoration: underline
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