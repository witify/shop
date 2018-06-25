<template>
    <form class="form" v-loading="form.loading" @submit.prevent="save()">

        <v-form-actions :locale="true"></v-form-actions>

        <div class="form-section is-stacked">
            <div class="form-header">
                <h2 class="title">Globals</h2>
                <h3 class="subtitle">Manage site's globals.</h3>
            </div>
            <div class="form-content">
                <v-input-remove v-for="(section, i) in form.data.content.list" @remove="form.data.content.remove(i)" :key="i">
                    <v-input :name="'content.' + i + '.id'"></v-input>
                    <v-input-locale :name="'content.' + i + '.name'"></v-input-locale>
                    <v-input-locale :name="'content.' + i + '.value'"></v-input-locale>
                </v-input-remove>

                <div class="button is-fill" @click="form.data.content.add()">
                    <b-icon icon="plus"></b-icon>
                    <span>New global</span>
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
            }
        },
        data () {
            return {
                form: {}
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
                this.form.patch('/dev/global/' + this.model.id)
            }
        }
    }
</script>
