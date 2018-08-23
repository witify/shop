<template>
    <form class="form" v-loading="form.loading" @submit.prevent="save()">

        <v-form-actions :locale="true"></v-form-actions>
        
        <div class="form-section is-stacked">
            <div class="form-header">
                <h2 class="title">Page details</h2>
                <h3 class="subtitle">Here you may enter your page details, such as the title and the slug.</h3>
            </div>
            <div class="form-content">
                <v-input-locale name="title"></v-input-locale>
                <v-input-locale name="slug"></v-input-locale>
                <v-input name="name"></v-input>
            </div>
        </div>

        <v-input-page-seo v-if="action === 'edit'"></v-input-page-seo>

        <div class="form-section is-stacked">

            <div class="form-header">
                <h2 class="title">Page sections</h2>
                <h3 class="subtitle">Customize all the page sections.</h3>
            </div>

            <div class="form-content">
                <v-input-remove @remove="form.data.sections.remove(i)" v-for="(section, i) in form.data.sections.list" :key="i">
                    <v-input :name="'sections.' + i + '.id'"></v-input>
                    <v-input :name="'sections.' + i + '.type'" component="v-input-select" :props="{options: types}"></v-input>
                    <v-input-locale :name="'sections.' + i + '.name'"></v-input-locale>
                    <v-input-page-section-content :section="section" :i="i"></v-input-page-section-content>    
                </v-input-remove>

                <div class="button is-fill" @click="form.data.sections.add()">
                    <b-icon icon="plus"></b-icon>
                    <span>New section</span>
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
                required: false,
                type: Object
            },
            action: {
                default: 'create',
                type: String
            }
        },
        data () {
            return {
                form: {},
                types: [
                    {value: 'text', label: 'Text'},
                    {value: 'picture', label: 'Picture'}
                ]
            }
        },
        created () {
            this.form = this.$form.create({
                schema: {
                    title: this.$form.input.locale(),
                    name: null,
                    slug: this.$form.input.locale(),
                    seo: {
                        title: this.$form.input.locale(),
                        description: this.$form.input.locale()
                    },
                    sections: [
                        {
                            id: null,
                            name: this.$form.input.locale(),
                            type: null,
                            content: this.$form.input.locale(),
                            value: null
                        }
                    ]
                },
                data: this.model
            })
        },
        methods: {
            save () {
                if (this.action === 'create') {
                    this.store()
                } else if (this.action === 'edit') {
                    this.update()
                }
            },
            store () {
                this.form.post('/dev/page')
            },
            update () {
                this.form.patch('/dev/page/' + this.model.id)
            }
        }
    }
</script>
