<template>
    <form class="form" v-loading.body="form.loading" @submit.prevent="save()">

        <v-form-actions :locale="true"></v-form-actions>

        <div class="form-section is-stacked">
            <div class="form-header">
                <h2 class="title">Globals</h2>
                <h3 class="subtitle">Manage site's globals.</h3>
            </div>
            <div class="form-content">
                <div class="form-list">
                    <div class="form-list__item" v-for="(section, i) in form.data.content.list">
                        <v-input-locale :name="'content.' + i + '.value'" :props="{type: 'textarea'}" :label="section.name[formState.locale].value"></v-input-locale>
                    </div>
                </div>
            </div>
        </div>

        <v-form-actions :locale="true"></v-form-actions>

    </form>
</template>

<script>
    export default {
        props: {
            model: {
                required: true,
                type: Object
            },
            title: {
                required: true,
                type: String
            }
        },
        data () {
            return {
                form: {},
                formState: this.$form.store.state
            }
        },
        created () {
            this.form = this.$form.create({
                schema: {
                    content: [
                        {
                            id: null,
                            name: this.$form.input.locale(),
                            value: this.$form.input.locale()
                        }
                    ]
                },
                data: this.model
            })
        },
        methods: {
            save () {
                this.form.patch('/admin/global/' + this.model.id)
            }
        }
    }
</script>
