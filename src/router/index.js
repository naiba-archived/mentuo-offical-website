import Vue from 'vue/dist/vue.esm.js'
import Router from 'vue-router'
import Home from '../pages/Home.vue'
import Cases from '../pages/Cases.vue'

Vue.use(Router)

const router = new Router({
  routes: [
    {
      meta: {
        title: '北京门拓科技 | 快速软件产品开发服务'
      },
      path: '/',
      component: Home
    },
    {
      meta: {
        title: '往期案例 | 北京门拓科技'
      },
      path: '/cases',
      component: Cases
    }
  ]
})

router.beforeEach((to, from, next) => {
  if (to.meta.title) {
    document.title = to.meta.title
  }
  next()
})

export default router;
