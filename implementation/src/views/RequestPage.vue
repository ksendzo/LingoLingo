<!--  Ksenija Bulatovic 2019/0730
      Miloš Ćirković 2017/0333  -->

<template>
<div>
    <NavAdmin/>
        <div class="row">
            <div class="col-6 ">
            <table class="box table text-white table-borderless tablePadding">
            <thead>
                <tr>
                    <th colspan="4">Professors:</th>
                </tr>

                <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">e-mail</th>
                <th scope="col">options</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="professor in professors" :key="professor.IdUser" v-bind:id="professor.IdUser">
                <td>{{ professor.IdUser }}</td>
                <td>{{ professor.FirstName }}</td>
                <td>{{ professor.Email }}</td>
                <td> 
                    <img class="languageIcon pointerImg" src="@/assets/false.png" v-on:click="approveAccount(professor.IdUser)"/>
                    <img class="languageIcon pointerImg" src="@/assets/decline.png" v-on:click="deleteAccount(professor.IdUser)"/>
                </td>
                </tr>
            </tbody>
            </table>
        </div>
            
        <div class="col-6">
            <table class="box table text-white table-borderless tablePadding">
            <thead>
                <tr>
                    <th colspan="4">Admins:</th>
                </tr>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">e-mail</th>
                <th scope="col">options</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="admin in admins" :key="admin.IdUser" v-bind:id="admin.IdUser">
                <td>{{ admin.IdUser }}</td>
                <td>{{ admin.FirstName }}</td>
                <td>{{ admin.Email }}</td>
                <td> 
                    <img class="languageIcon pointerImg" src="@/assets/false.png" v-on:click="approveAccount(admin.IdUser)"/>
                    <img class="languageIcon pointerImg" src="@/assets/decline.png" v-on:click="deleteAccount(admin.IdUser)"/>
                </td>
                </tr>
            </tbody>
            </table>
        </div>
    </div>
</div>
</template>

<style>
.tablePadding {
    margin-right: 30px;
    margin-left: 30px ;
    width: 100%;
}
</style>


<script>
import NavAdmin from '@/components/admin/NavAdmin.vue'

export default {
    components: {
        NavAdmin
    },
    data(){
        return{
            professors: [],
            admins: []
        }
    }, 
    beforeMount() {
        if(!localStorage.Username)
        {
          this.$router.push("/");
        }
        else if(localStorage.UserTypeId == 1)
          this.$router.replace('/player');
        else if(localStorage.UserTypeId == 2)
          this.$router.replace('/professor');

        this.$admin.post('/GetUsersPendingApproval')
      .then( res => {
          this.professors = res.data.PendingProfessors;
          this.admins = res.data.PendingAdmins;
          })
      .catch(err => {
              this.msg = err.response.data.message.console.error();
              alert("Unknown error");
          })
    },
    methods: {
        approveAccount: function(idAccount) {
            let form = {
            'IdUser': idAccount
            }

            this.$admin.post('/ApproveAccount', JSON.stringify(form))
            .then( () => {
                alert("Account approved");
                this.$router.go(0);
            })
            .catch(err => {
                this.msg = err.response.data.message.console.error();
                alert("Unknown error");
        })
      },
        deleteAccount: function(idAccount) {
            let form = {
                'IdUser': idAccount
            }

            this.$admin.post('/DeleteAccount', JSON.stringify(form))
            .then( () => {
                alert("Account deleted");
                this.$router.go(0);
            })
            .catch(err => {
                this.msg = err.response.data.message.console.error();
                alert("Unknown error");
            })
        },      
    },
    name: 'RequestPage'
}
</script>