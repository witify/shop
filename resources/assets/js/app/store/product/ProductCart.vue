<template>

    <div class="product-cart" v-loading="form.loading">
        <div>
            <span class="is-size-4">{{ price_format(price) }}</span>
        </div>

        <div v-for="(options, key) in product.options" :key="key">
            <v-input :name="'options.' + key" component="v-input-select" :props="{options: mapOptions(options)}" @change="getPrice()"></v-input>
        </div>

        <add-to-cart :product-id="product.id" :options.sync="options"></add-to-cart>
    </div>

</template>

<script>
export default {
    props: {
        product: {
            required: true,
            type: Object
        }
    },
    data() {
        return {
            price: this.product.price,
            form: null,
            options: {}
        }
    },
    created() {
        let optionsSchema = {}
        Object.keys(this.product.options).forEach(key => {
            optionsSchema[key] = null
        })
        this.form = this.$form.create({
            schema: {
                product_id: null,
                options: optionsSchema
            }
        })
    },
    methods: {
        getPrice() {
            this.form.data.product_id.value = this.product.id
            this.options = this.form.getJsonData().options

            this.form.post('/cart/get_price')
            .then(response => {
                this.price = response.price
            })
        },
        mapOptions(options) {
            let formattedOptions = []
            Object.keys(options).forEach(key => {
                formattedOptions.push({
                    value: key,
                    label: options[key].label[this.$laravel.app.locale]
                })
            })
            return formattedOptions
        }
    }
}
</script>