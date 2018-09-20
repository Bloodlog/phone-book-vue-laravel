<template>
    <div>
        <div class="form-group">
            <router-link to="/" class="btn btn-default">Back</router-link>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Edit contact</div>
            <div class="panel-body">
                <form v-on:submit="saveForm()">
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Contact name</label>
                            <input type="text" v-model="contact.name" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Contact phone</label>
                            <input type="text" v-model="contact.phone" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Contact comment</label>
                            <input type="text" v-model="contact.comment" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <button class="btn btn-success">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                contactId: null,
                contact: {
                    name: '',
                    phone: '',
                    comment: ''
                }
            };
        },
        mounted() {
            let app = this;
            let id = app.$route.params.id;
            app.contactId = id;
            axios.get('/api/v1/contacts/' + id)
                .then(function (resp) {
                    app.contact = resp.data.data[0];
                })
                .catch(function () {
                    alert("Could not load your contact")
                });
        },
        methods: {
            saveForm() {
                event.preventDefault();
                var app = this;
                var newContact = app.contact;
                axios.put('/api/v1/contacts/' + app.contactId, newContact)
                    .then(function (resp) {
                        app.$router.replace('/');
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        alert("Could not create your contact");
                    });
            }
        }
    }
</script>
