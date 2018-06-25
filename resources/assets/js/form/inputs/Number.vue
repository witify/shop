<template>
    <div class="field">
        <div class="control">
            <input 
            class="input"
            type="number"
            @input="$emit('change')"
            v-model="$parent.formElement.value" 
            :placeholder="placeholder"
            :class="{'is-danger': $parent.hasError()}"
            :min="min"
            :max="max"
            :step="step"
            >
        </div>
    </div>
</template>

<script>
export default {
    props: {
        placeholder: {
            type: String
        },
        min: {
            type: Number
        },
        max: {
            type: Number
        },
        step: {
            type: Number,
            default: 1
        }
    },
    computed: {
        status() {
            if ($parent.hasError()) {
                return 'is-danger'
            }
            return ''
        }
    }
}
</script>
