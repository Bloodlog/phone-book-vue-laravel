<template>
    <div>
        <div class="form-group">
            <router-link :to="{name: 'createContact'}" class="btn btn-success">Create new contact</router-link>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Contacts list</div>
            <div class="panel-body">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Comment</th>
                        <th width="100">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(contact, index) in contacts">
                        <td>{{ contact.name }}</td>
                        <td><a :href="'tel:' + contact.phone">{{ contact.phone }}</a></td>
                        <td>{{ contact.comment }}</td>
                        <td>
                            <router-link :to="{name: 'editContact', params: {id: contact.id}}"
                                         class="btn btn-xs btn-primary">
                                Edit
                            </router-link>
                            <a href="#"
                               class="btn btn-xs btn-danger"
                               v-on:click="deleteEntry(contact.id, index)">
                                Delete
                            </a>
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
        data() {
            return {
                contacts: []
            };
        },
        mounted() {
            var app = this;
            console.log(this.test);
            axios.get('/api/v1/contacts')
                .then(function (resp) {
                    var response = resp.data;
                    //todo: Исправить на беке
                    console.log(response.data[0]);
                    app.contacts = response.data[0];
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Не удалось загрузить компании");
                });
        },
        methods: {
            deleteEntry(id, index) {
                if (confirm("Вы действительно хотите удалить телефон?")) {
                    var app = this;
                    axios.delete('/api/v1/contacts/' + id)
                        .then(function (resp) {
                            app.contacts.splice(index, 1);
                        })
                        .catch(function (resp) {
                            alert("Не удалось удалить телефон");
                        });
                }
            }
        }
    }
</script>
