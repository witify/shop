<template>
    <div>
        <v-input
            v-if="section.type.value === 'picture'"
            component="v-input-picture"
            :name="'sections.' + i + '.value'"
            :label="getLabel(section)"
        ></v-input>
        <v-input-locale 
            v-if="section.type.value === 'text'"
            :props="{type: 'textarea'}"
            :name="'sections.' + i + '.content'"
            :label="getLabel(section)"
        ></v-input-locale>
    </div>
</template>

<script>
export default {
    props: {
        section: {
            required: true,
            type: Object
        },
        i: {
            required: true
        }
    },
    methods: {
        getLabel (section) {
            return section.name[this.$form.store.state.locale].value
        }
    }
}
</script>
