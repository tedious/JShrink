export default class Example{#prop
set prop(value){this.#prop=value
this.#event(value)}
get prop(){return this.#prop}
constructor(arg){this.#prop=arg
if(arg){this.#method()}}
#event=f=>{if(typeof f==='function'){f()}}
#method=async _=>{return fetch(param)}}