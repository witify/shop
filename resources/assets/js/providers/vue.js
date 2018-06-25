/*
 |--------------------------------------------------------------------------
 | Vue
 |--------------------------------------------------------------------------
 */

window.Vue = require('vue')

Vue.prototype.$laravel = window.Laravel
Vue.prototype.$isMobile = window.isMobile.any

/*
 |--------------------------------------------------------------------------
 | Buefy
 |--------------------------------------------------------------------------
 */

import Buefy from 'buefy'
Vue.use(Buefy)

/*
 |--------------------------------------------------------------------------
 | Directives
 |--------------------------------------------------------------------------
 */

Vue.directive('loading', {
    inserted (el, binding, vnode) {
        let loadingMask = document.createElement('div')
        loadingMask.className = 'loading-mask'
        el.appendChild(loadingMask)
    },
    update (el, binding, vnode) {
        let loadingMask = el.getElementsByClassName('loading-mask')[el.getElementsByClassName('loading-mask').length - 1] // Get the last div in the node
        if (binding.value) {
            loadingMask.className += ' is-active'
        } else {
            loadingMask.className = 'loading-mask'
        }
    }
})

/*
 |--------------------------------------------------------------------------
 | Prototypes
 |--------------------------------------------------------------------------
 */

Vue.prototype.$redirect = function(url) {
    if (url !== undefined) {
        window.location.href = url
    } else {
        console.error('url in $redirect() is undefined')
    }
}

Vue.prototype.$refresh = function() {
    location.reload()
}

Vue.prototype.$logout = function() {
    axios.post('/logout')
    .then(response => {
        Vue.prototype.$refresh()
    })
}

Vue.prototype.price_format = window.price_format // See providers/helpers for more information

/*
 |--------------------------------------------------------------------------
 | VueForm
 |--------------------------------------------------------------------------
 */

import Form from 'sprintify-formly'
Vue.use(Form, {
    locale: Laravel.app.locale,
    locales: Laravel.app.locales,
    onFormFail(response) {
        let message = "Whoops! An error as occured"
        try { message = response.data.message || message } catch(e) {}
        try { message = response.data.errors.message || message } catch(e) {}

        Vue.prototype.$snackbar.open({
            message: message,
            type: 'is-danger',
            queue: false
        })
    },
    onFormSuccess(response) {
        // If redirect
        if (response && response.redirect) {
            window.location.replace(response.redirect)
        }
    }
})

/*
 |--------------------------------------------------------------------------
 | Layouts
 |--------------------------------------------------------------------------
 */

Vue.component('v-layout-dashboard', require('../layouts/Dashboard.vue'))
Vue.component('v-navbar', require('../layouts/partials/Navbar.vue'))

/*
 |--------------------------------------------------------------------------
 | Partials
 |--------------------------------------------------------------------------
 */

Vue.component('v-data-table', require('../partials/DataTable.vue'))

/*
 |--------------------------------------------------------------------------
 | Global Form components
 |--------------------------------------------------------------------------
 */

Vue.component('v-delete-button', require('../form/partials/DeleteButton.vue'))
Vue.component('v-input-remove', require('../form/partials/InputRemove.vue'))
Vue.component('v-form-actions', require('../form/partials/FormActions.vue'))
Vue.component('v-form-locales-switcher', require('../form/partials/FormLocalesSwitcher.vue'))

Vue.component('v-input-page-section-content', require('../form/page/SectionContent.vue'))
Vue.component('v-input-page-seo', require('../form/page/Seo.vue'))

/*
 |--------------------------------------------------------------------------
 | Account components
 |--------------------------------------------------------------------------
 */

Vue.component('v-account-settings', require('../account/AccountSettings.vue'))

/*
 |--------------------------------------------------------------------------
 | Input components
 |--------------------------------------------------------------------------
 */

Vue.component('v-input-select', require('../form/inputs/Select.vue'))
Vue.component('v-input-picture', require('../form/inputs/Picture.vue'))
Vue.component('v-input-text', require('../form/inputs/Text.vue'))

/** Rich text edition */
/** Since it's a pretty big package, we do not include it by default */

/**
import VueQuillEditor from 'vue-quill-editor'
import 'quill/dist/quill.core.css'
import 'quill/dist/quill.snow.css'
Vue.use(VueQuillEditor)
Vue.component('v-input-rich-text', require('../app/inputs/RichText.vue'))
*/