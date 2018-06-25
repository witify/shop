<template>
    <form class="form" v-loading.body="form.loading" @submit.prevent="save()">

        <v-form-actions :locale="true"></v-form-actions>

        <v-input-page-seo></v-input-page-seo>

        <div v-if="form.data.sections.any()" class="form-section is-stacked">
            <div class="form-header">
                <h2 class="title">Sections</h2>
                <h3 class="subtitle">Manage the page's sections</h3>
            </div>
            <div class="form-content">
                <v-input-page-section-content 
                    v-for="(section, i) in form.data.sections.list"
                    :section="section"
                    :i="i"
                    :key="i"
                ></v-input-page-section-content>
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
            /** Form Creation **/
            this.form = this.$form.create({
                schema: {
                    title: this.$form.input.locale(),
                    view: null,
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
                this.form.patch('/admin/page/' + this.model.id)
            }
        }
    }
</script>
