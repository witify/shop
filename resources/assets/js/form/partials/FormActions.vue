<template>
    <div class="form-actions">

        <v-form-locales-switcher class="is-inline"></v-form-locales-switcher>
        <a @click="back()" class="button is-grey">Cancel</a>
        <button class="button is-primary">Save</button>
        
        <slot></slot>
    </div>
</template>

<script>
    export default {
        props: {
            locale: {
                default: false,
                type: Boolean
            }
        },
        methods: {
            save () {
                this.$emit('save')
            },
            back () {
                history.go(-1)
            }
        }
    }
</script>
