<template>
    <div>
        <v-account-info></v-account-info>
        <v-account-password></v-account-password>
    </div>
</template>

<script>
    import AccountInfo from './AccountInfo'
    import AccountPassword from './AccountPassword'

    export default {
        props: {
            user: {
                required: true,
                type: Object
            }
        },
        components: {
            'v-account-info': AccountInfo,
            'v-account-password': AccountPassword,
        }
    }
</script>
