<template>
    
    <form class="form" v-loading.body="form.loading" @submit.prevent="save()">
        <v-input name="name"></v-input>
        <v-input name="email"></v-input>
        <v-input name="message" :props="{type: 'textarea'}"></v-input>

        <input type="submit" class="button is-primary is-fluid" :value="$__('input.submit')">
    </form>

</template>

<script>
    export default {
        data () {
            return {
                form: {}
            }
        },
        created () {
            this.form = this.$form.create({
                schema: {
                    email: null,
                    name: null,
                    message: null
                }
            })
        },
        methods: {
            save () {
                this.form.post('/contact')
                .then(response => {
                    location.reload()
                })
            }
        }
    }
</script>
