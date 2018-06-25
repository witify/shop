<template>
    <b-select icon="earth" v-model="state.locale">
        <option v-for="(locale, key) in $form.config.locales" :value="key" :key="key">{{ locale }}</option>
    </b-select>
</template>

<script>

export default {
    data () {
        return {
            state: this.$form.store.state
        }
    },
}
</script>
