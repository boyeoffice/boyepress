import Vue from 'vue'
import VueRouter from 'vue-router'
import Dashboard from './views/Dashboard.vue'
import Parent from './views/Parent.vue'

Vue.use(VueRouter)
const router = new VueRouter({
	mode: 'history',
	routes:[
		{
			path: '/dashboard',
			component: Dashboard,
			beforeEnter: requireAuth,
			children: [
			{
				path: '/',
				 component: require('./views/Home.vue')
			},
			{
				path: 'posts',
				component: Parent,
				children: [
				{
					path: '/',
					component: require('./views/dashboard/Posts/Index.vue')
				},
				{
					path: 'create',
					component: require('./views/dashboard/Posts/Create.vue')
				},
				{
					path: ':id/edit',
					component: require('./views/dashboard/Posts/Edit.vue')
				}
				]
			},
			{
				path: 'users',
				component: Parent,
				children: [
				{
					path: '/',
					component: require('./views/dashboard/Users/Index.vue')
				},
				{
					path: 'create',
					component: require('./views/dashboard/Users/Create.vue')
				},
				{
					path: ':id/edit',
					component: require('./views/dashboard/Users/Edit.vue')
				}
				]
			},
			{
				path: 'category',
				component: Parent,
				children: [
				{
					path: '/',
					component: require('./views/dashboard/categories/Index.vue')
				}
				]
			}
			]
		}
	]
})
function requireAuth (to, from, next) {
    if (window.User) {
        return next()
    } else {
        return next('/')
    }
}
export default router