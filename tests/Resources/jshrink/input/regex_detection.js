function test () {
  return this.indeterminate
    ? 100
    : (100 * (this.options.value - this.min)) / (this.options.max - this.min)
}
