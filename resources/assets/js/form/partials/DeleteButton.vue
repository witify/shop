<template>
  <div @click="prompt()" class="icon has-text-grey">
    <i class="mdi mdi-delete mdi-18px"></i>
  </div>
</template>

<script>
  export default {
    props: {
      url: {
        required: true,
        type: String
      },
      type: {
        required: false,
        type: String,
        default: 'is-grey'
      }
    },
    data() {
      return {
        form: this.$form.create({
          schema: {}
        })
      }
    },
    methods: {
      prompt() {
        this.$dialog.confirm({
          title: 'Delete the record',
          message: 'This will permanently delete the record. Continue?',
          confirmText: 'Delete the record',
          type: 'is-danger',
          hasIcon: false,
          onConfirm: () => this.destroy()
        })
      },

      destroy() {
        this.form.delete(this.url)
        .then(response => {
          this.$emit('success', response)
        })
        .catch(error => {
          this.$toast.open({
            message: 'Whoops! We could not delete the record.',
            type: 'is-danger'
          })
          this.$emit('error', error)
        })
      }
    }
  }
</script>

<style scoped>
  .icon {
    cursor: pointer;
  }
</style>