<template>
  <div class="box">
    <a class="delete" @click="prompt()"></a>
    <slot></slot>
  </div>
</template>

<script>
  export default {
    methods: {
      prompt() {
        this.$dialog.confirm({
          title: 'Delete the record',
          message: 'This will permanently delete the record. Continue?',
          confirmText: 'Delete the record',
          type: 'is-danger',
          onConfirm: () => this.$emit('remove')
        })
      },
    }
  }
</script>

<style lang="scss" scoped>
.box {
  position: relative;
  .delete {
    position: absolute;
    right: 10px;
    top: 10px;
  }
}
</style>
