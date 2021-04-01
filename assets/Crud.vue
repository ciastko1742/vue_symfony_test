<template>
    <div>
        <div class="row header">
            <div class="col"><h2>CRUD TEST</h2></div>
            <div class="col text-right"><button class="btn btn-success" @click="showModal">Dodaj nowego usera</button></div>
        </div>
        <div class="alert alert-success" v-if="successMsg">{{ successMsg }}</div>
        <div class="alert alert-danger" v-if="errorMsg">{{ errorMsg }}</div>

        <div class="row">
            <div class="col-lg-12">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr class="text-center bg-info text-light">
                            <th>ID</th><th>Name</th><th>E-mail</th><th>Phone</th><th>Edit</th><th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center" v-for="user in users">
                            <td>{{ user.id }}</td>
                            <td>{{ user.name }}</td>
                            <td>{{ user.email }}</td>
                            <td>{{ user.phone }}</td>
                            <td><a href="#" class="btn btn-primary">Edytuj</a></td>
                            <td><a href="#" class="btn btn-danger">Usuń</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <addUserModal v-if="addUserModal" @closeModal="closeModal" @addUser="addUser"/>

    </div>
</template>

<script>
    import addUserModal from './crudComponents/modal.vue'
    import axios from 'axios'

    export default {
        components: {
          addUserModal,
          axios
        },
        data(){
            return {
                successMsg: "",
                errorMsg: "",
                addUserModal: false,
                users: [],
                currentUser: {}
            }
        },
        mounted: function(){
            this.getAllUsers();
        },
        methods: {
            showModal(){this.addUserModal = true;},
            closeModal(){ this.addUserModal = false },
            getAllUsers(){
                let self = this;
                axios.get("/crud/getAll").then(function(response){
                    self.users = response.data.users;
                })
            },
            addUser(user){
                let self = this;
                axios.post("/crud/addUser", user).then(function(response){
                    self.getAllUsers();
                    self.closeModal()
                }).catch(function(error){
                    console.log(error);
                    self.errorMsg = "Błąd";
                });
            }
        }
    }
</script>
