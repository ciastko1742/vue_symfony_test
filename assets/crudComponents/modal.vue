<template>
    <div id="overlay">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New User</h5>
                    <button type="button" class="close" @click="closeModal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-4">
                    <form action="#" method="post">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control form-control-lg" placeholder="Name" v-model="newUser.name">
                        </div>
                        <div class="form-group">
                            <input type="text" name="e-mail" class="form-control form-control-lg" placeholder="E-mail" v-model="newUser.email">
                        </div>
                        <div class="form-group">
                            <input type="number" name="" class="form-control form-control-lg" placeholder="Phone" v-model="newUser.phone">
                        </div>
                        <div class="form-group">
                            <input type="button" name="" class="form-control btn btn-success" value="Dodaj" @click="addNewUser">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                newUser: {
                    name : "",
                    email : "",
                    phone : ""
                }
            }
        },
        methods: {
            closeModal(){
                this.$emit('closeModal')
            },
            addNewUser() {
                this.$emit('addUser', this.newUser);
            }
        }
    }
</script>

<style scoped>
    #overlay {
        position: fixed;
        top: 0;
        bottom: 0;
        left:0;
        right: 0;
        background: rgba(0,0,0,0.6);
    }
</style>