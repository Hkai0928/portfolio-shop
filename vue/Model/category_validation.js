var app = new Vue({
  el: '#validation',
  data: {
    name: '',
    inputCounts: {},
    isBtnActive: true,
  },
  computed: {
    //
    isActive() {
      return Object.keys(this.inputCounts).length > 0 ? this.isBtnActive = false : this.isBtnActive = true;
    },
  },
  watch: {
    name(name) {
      if(name != "") {
        this.$set(this.inputCounts, "name")
      } else {
        this.$delete(this.inputCounts, 'name')
      }
    },
  }

});
