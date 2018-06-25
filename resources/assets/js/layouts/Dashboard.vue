<template>
    <div class="dashboard">
        <div class="container">

            <!-- Mobile menu fade background -->
            <transition name="fade">
                <div v-show="menuIsOpened" @click="closeMenu()" class="dashboard-menu-background is-hidden-tablet"></div>
            </transition>
            
            <!-- Menu -->
            <div class="dashboard-menu" :class="{'is-active': menuIsOpened}">

                <div @click="closeMenu()" class="dashboard-menu-button-close is-hidden-tablet">
                    <b-icon icon="close"></b-icon>
                </div>

                <div class="dashboard-brand">
                    <a href="/"><img :src="$laravel.app.logo" :alt="$laravel.app.name + ' logo'"></a>
                </div>

                <slot name="menu"></slot>

            </div>

            <!-- Content -->
            <div class="dashboard-content">

                <div class="dashboard-header">
                    <div @click="openMenu()" class="dashboard-menu-button-open is-hidden-tablet">
                        <b-icon icon="menu"></b-icon>
                    </div>
                    <slot name="header"></slot>
                </div>

                <div class="dashboard-body">
                    <slot name="body"></slot>
                </div>

            </div>

        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            menuIsOpened: false
        }
    },
    methods: {
        openMenu() {
            this.menuIsOpened = true
        },
        closeMenu() {
            this.menuIsOpened = false
        }
    }
}
</script>
