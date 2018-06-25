/*
 |--------------------------------------------------------------------------
 | Laravel Notifications
 |--------------------------------------------------------------------------
 */

function showNotifications() {
    for (let i = 0; i < Laravel.notifications.length; i++) {
        if (Laravel.notifications[i] === undefined) {
            return
        }
        let level = Laravel.notifications[i].level
        Vue.prototype.$toast.open({
            message: Laravel.notifications[i].message,
            position: 'is-top',
            type: 'is-' + level
        })
    }
}

showNotifications()
