// import 'babel-polyfill'
// import Vue from 'vue'
import Vue from 'vue/dist/vue.esm.js'
import App from './App.vue'
import router from './router'
import VueAnalytics from 'vue-analytics'

// 引入element组件库
import ElementUI from 'element-ui'
import 'element-ui/lib/theme-chalk/index.css'
import 'element-ui/lib/theme-chalk/display.css';
import '../static/styles/home.less';

Vue.use(ElementUI);
Vue.use(VueAnalytics, {
    id: 'UA-111315498-11',
    router,
    autoTracking: {
        pageviewOnLoad: true
    }
})

new Vue({
    el: '#app',
    router,
    template: "<App/>",
    components: { App }
})
