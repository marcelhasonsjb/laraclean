// let's rock
import '../bootstrap'
import router from './router'
import Admin from './Admin.vue'

Vue.config.ignoredElements = ['trix-editor']

// vue me
const admin = new Vue({
    router,
    render: h => h(Admin)
}).$mount('#admin')