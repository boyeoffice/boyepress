require('./bootstrap')
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
import Profile from './components/Profile/profile.vue'


const app = new Vue({
	el: '#app',
	components: { Profile }
})