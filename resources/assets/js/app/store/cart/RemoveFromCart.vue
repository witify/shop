<template>
    <button class="delete" @click="remove" :class="{'is-loading': form.loading}"></button>
</template>

<script>
export default {
    props: {
        rowId: {
            required: true,
            type: String
        }
    },
    data() {
        return {
            form: this.$form.create()
        }
    },
    methods: {
        remove() {
            this.form.delete('/cart/' + this.rowId)
            .then(response => {
                this.$refresh()
            })
        }
    }
}
</script>
