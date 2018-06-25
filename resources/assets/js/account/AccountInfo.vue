<template>
    <form class="form-section is-stacked" v-loading="form.loading" @submit.prevent="save()">
        <div class="form-header">
            <h2 class="title">Informations</h2>
            <h3 class="subtitle">All you personal informations.</h3>
        </div>
        <div class="form-content">
            <v-input name="name"></v-input>
            <v-input name="email" type="email"></v-input>

            <button class="button is-primary">Save</button>
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
                    name: null,
                    email: null
                },
                data: this.user
            })
        },
        methods: {
            save () {
                this.form.patch('/account/info')
                .then(response => {
                    this.$refresh();
                })
            }
        }
    }
</script>