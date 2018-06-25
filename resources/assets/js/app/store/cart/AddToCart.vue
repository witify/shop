<template>
    <button class="button is-primary" @click="add" :class="{'is-loading': form.loading}">
        <span class="icon">
            <i class="mdi mdi-cart"></i>
        </span>
        <span>
            Add to cart
        </span>
    </button>
</template>

<script>
export default {
    props: {
        productId: {
            required: true,
            type: Number
        },
        options: {
            type: Object,
            default() {
                return {}
            }
        }
    },
    data() {
        return {
            form: this.$form.create({
                schema: {
                    product_id: null,
                    quantity: null,
                    options: null
                }
            }),
            quantity: 1
        }
    },
    created() {
        this.form.data.product_id.value = this.productId
        this.form.data.quantity.value = 1
    },
    methods: {
        add() {
            this.form.data.quantity.value = this.quantity
            this.form.data.options.value = this.options
            this.form.post('/cart')
        }
    }
}
</script>
