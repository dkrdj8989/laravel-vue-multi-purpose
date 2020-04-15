<template>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            Users
                        </h3>
                        <div class="card-tools">
                            <button class="btn btn-success" data-toggle="modal" data-target="#add-user">
                                Add New <i class="fas fa-user-plus fa-fw"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table id="example1" class="table table-hover">
                            <thead>
                            <tr role="row">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Modify</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="user in users" :key="user.id">
                                <td>{{ user.id }}</td>
                                <td>{{ user.name }}</td>
                                <td>{{ user.email }}</td>
                                <td>{{ user.type }}</td>
                                <td>
                                    <a href="">
                                        <i class="fa fa-edit blue"></i>
                                    </a>
                                    /
                                    <a href="">
                                        <i class="fa fa-trash red"></i>
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                            <tfoot>
                            <tr>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" id="add-user" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="createUser">
                    <div class="modal-body">
                        <div class="form-group">
                            <input v-model="form.name" type="text" name="name" placeholder="User Name"
                                   class="form-control" :class="{ 'is-invalid':form.errors.has('name') }">
                            <has-error :form="form" field="name"></has-error>
                        </div>
                        <div class="form-group">
                            <input v-model="form.email" type="email" name="email"
                                   class="form-control" :class="{ 'is-invalid':form.errors.has('email') }"
                            placeholder="Email Address">
                            <has-error :form="form" field="email"></has-error>
                        </div>
                        <div class="form-group">
                            <input v-model="form.password" type="password" name="password" class="form-control"
                                   :class="{ 'is-invalid': form.errors.has('password') }"
                                   placeholder="Password">
                            <has-error :form="form" field="password"></has-error>
                        </div>
                        <div class="form-group">
                            <select v-model="form.type" name="type"
                                    class="form-control" :class="{ 'is-invalid':form.errors.has('type') }">
                                <option value="admin">Admin</option>
                                <option value="nm_user">Normal User</option>
                            </select>
                            <has-error :form="form" field="type"></has-error>
                        </div>
                        <div class="form-group">
                            <textarea v-model="form.bio" class="form-control" :class="{ 'is-invalid':form.errors.has('bio') }"
                                   name="bio" placeholder="Short bio for User (Optional)"/>
                            <has-error :form="form" field="bio"></has-error>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create</button>
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
                users : {},
                form: new Form({
                    name : '',
                    email: '',
                    password: '',
                    type: '',
                    bio: '',
                    photo: ''
                })
            }
        },
        methods: {
            loadUsers(){
                axios.get('api/user').then((result) => this.users = result.data.data);
            },

            createUser(){
                this.form.post('api/user');
            }
        },
        created() {
            this.loadUsers();
        },
        mounted() {
        }
    }
</script>

<style scoped>

</style>