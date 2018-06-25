<template>

    <nav class="navbar is-fixed-top is-transparent">
        <div class="container">

            <div class="navbar-brand">
                <a class="navbar-item" href="/">
                    <img :src="$laravel.app.logo" :alt="$laravel.app.name + ' logo'" width="118">
                </a>
                <div @click="toggle()" class="navbar-burger" :class="{'is-active': active}">
                    <slot name="menu-button">
                        <span></span>
                        <span></span>
                        <span></span>
                    </slot>
                </div>
            </div>

            <div class="navbar-menu" :class="{'is-active': active}">

                <slot></slot>

            </div>

        </div>
    </nav>

</template>

<script>
export default {
    data() {
        return {
            active: false
        }
    },
    methods: {
        toggle() {
            this.active = !this.active
        }
    }
}
</script>
