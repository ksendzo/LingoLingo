<template>
    <div class="container">
        <div class="row">
            <div class="col-6">
            <table class="table mt-5 table-dark">
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
                <tr v-for="(entry, i) in professors" :key="i">
                <th scope="row">{{ ++i }}</th>
                <td>{{ entry.name }}</td>
                <td>{{ entry.mail }}</td>
                <td> 
                    <img class="languageIcon" src="@/assets/false.png"/>
                    <img class="languageIcon" src="@/assets/decline.png"/>
                </td>
                </tr>
            </tbody>
            </table>
        </div>
        <div class="col-6">
            <table class="table mt-5 table-dark">
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
                <tr v-for="(entry, i) in admins" :key="i">
                <th scope="row">{{ ++i }}</th>
                <td>{{ entry.name }}</td>
                <td>{{ entry.mail }}</td>
                <td> 
                    <img class="languageIcon" src="@/assets/false.png"/>
                    <img class="languageIcon" src="@/assets/decline.png"/>
                </td>
                </tr>
            </tbody>
            </table>
        </div>
    </div>
  </div>
</template>

<script>
export default {
    data(){
        return{
            professors: [
                {name: "Petar", mail: "losop79250@gmail.com"},
                {name: "Mirko", mail: "sdgsfsef@gmail.com"},
                {name: "Stefan", mail: "wgefhdfhd@gmail.com"},
                {name: "Marko", mail: "rjhegsdf@gmail.com"},
                {name: "Nikola", mail: "asfdczd@gmail.com"}
            ],
            admins: [
                {name: "Maja", mail: "sdfew2sas@gmail.com"},
                {name: "Jana", mail: "iopkrscv@gmail.com"},
                {name: "Kristina", mail: "nhjllm.dffg@gmail.com"}
            ]

        }
    }, 
    name: 'RequestList'
}
</script>