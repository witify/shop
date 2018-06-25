<template>
    <form class="form-section is-stacked" v-loading="form.loading" @submit.prevent="save()">
        <div class="form-header">
            <h2 class="title">Update your password</h2>
            <h3 class="subtitle">Update your password.</h3>
        </div>
        <div class="form-content">
            <v-input name="old_password" :props="{type: 'password'}"></v-input>
            <v-input name="new_password" :props="{type: 'password'}"></v-input>
            <v-input name="new_password_confirmation" :props="{type: 'password'}"></v-input>

            <button class="button is-primary">Update password</button>
        </div>
    </form>
</template>

<script>
    export default {
        data () {
            return {
                form: {},
            }
        },
        computed: {
            user() {
                return this.$parent.user
            }
        },
        created () {
            this.form = this.$form.create({
                schema: {
                    old_password: null,
                    new_password: null,
                    new_password_confirmation: null
                },
                data: this.user
            })
        },
        methods: {
            save () {
                this.form.patch('/account/password')
                .then(response => {
                    this.$refresh();
                })
            }
        }
    }
</script>