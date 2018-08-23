<template>
    
    <form class="form" v-loading.body="form.loading" @submit.prevent="save()">

        <div class="columns is-multiline">
            <div class="column is-half">
                <v-input name="first_name"></v-input>
            </div>
            <div class="column is-half">
                <v-input name="last_name"></v-input>
            </div>
            <div class="column is-half">
                <v-input name="business_name"></v-input>
            </div>
            <div class="column is-one-quarter">
                <v-input name="business_tax_id"></v-input>
            </div>
            <div class="column is-one-quarter">
                <v-input name="business_id"></v-input>
            </div>
            <div class="column is-one-quarter">
                <v-input name="address_1"></v-input>
            </div>
            <div class="column is-one-quarter">
                <v-input name="address_2"></v-input>
            </div>
            <div class="column is-one-quarter">
                <v-input name="city"></v-input>
            </div>
            <div class="column is-one-quarter">
                <v-input name="zip_code"></v-input>
            </div>
            <div class="column is-half">
                <v-input name="phone"></v-input>
            </div>
            <div class="column is-half">
                <v-input name="phone_alt"></v-input>
            </div>
            <div class="column is-half">
                <v-input name="country"></v-input>
            </div>
            <div class="column is-half">
                <v-input name="state"></v-input>
            </div>
        </div>

        <input type="submit" class="button is-primary is-fluid" :value="$__('input.add')">
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
                    first_name: null,
                    last_name: null,
                    business_name: null,
                    business_tax_id: null,
                    business_id: null,
                    address_1: null,
                    address_2: null,
                    city: null,
                    zip_code: null,
                    phone: null,
                    phone_alt: null,
                    country: null,
                    state: null
                }
            })
        },
        methods: {
            save () {
                this.form.post('/account/address')
                .then(response => {
                    location.reload()
                })
            }
        }
    }
</script>
