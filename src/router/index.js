import Vue from 'vue/dist/vue.esm.js'
import Router from 'vue-router'
import Home from '../pages/Home.vue'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      component: Home
    }
  ]
})
