
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import App from './App.vue'
import Router from './routes.js'
import VeeValidate from 'vee-validate'
import httpPlugin from './plugins/http'

Vue.use(httpPlugin)
Vue.use(VeeValidate)

Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue')
)
Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue')
)
Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue')
)

const app = new Vue({
    el: '#app',
    render: h => h(App),
    router: Router
});
