import Vue from 'vue'
import VueRouter from 'vue-router'
import routes from './routes'
import Master from './components/components/layouts/Master'
import { store } from './components/store/store'

window.eventBus = new Vue();

Vue.config.productionTip = false
Vue.use(VueRouter)

const router = new VueRouter({
    routes,
    mode: 'history'
})

/* eslint-disable no-new */
new Vue({
    el: '#app',
    router: router,
    store: store,
    components: { Master },
    template: '<Master/>'
})