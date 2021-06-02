<template>
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
                    <img class="languageIcon" src="@/assets/false.png"/>
                    <img class="languageIcon" src="@/assets/decline.png"/>
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
                    <img class="languageIcon" src="@/assets/false.png"/>
                    <img class="languageIcon" src="@/assets/decline.png"/>
                </td>
                </tr>
            </tbody>
            </table>
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
export default {
    data(){
        return{
            professors: [],
            admins: []
        }
    }, 
    name: 'RequestList',
    beforeMount() {
        alert("Nesto");
        this.$admin.post('/GetUsersPendingApproval')
      .then( res => {
          this.professors = res.data.PendingProfessors;
          })
      .catch(err => {
              this.msg = err.response.data.message.console.error();
              alert("Unknown error");
          })
    },
    methods: {

    }
}
</script>