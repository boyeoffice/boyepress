<template>
<aside id="sidebar">
	<section class="affix-top">
		 <div class="user-panel">
	        <div class="pull-left image">
	          <img v-bind:src="url + '/' + user.avatar" class="img-circle" alt="User Image">
	        </div>
	        <div class="pull-left info">
	          <p>{{ user.name }}</p>
	          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
	        </div>
      </div>
           <div class="menu-button">
        	<a href="/" title="Home"><i class="fa fa-home"></i></a>
        	<a :href="userInfo" title="Profile"><i class="ion ion-person"></i></a>
        	<a href="javascript:void(0)" @click="Logout" title="Logout"><i class="fa fa-sign-out"></i></a>
            </div>
            <div class="item">
            	<div class="header">User Manager</div>
            	<div class="menu">
            	  <router-link class="item" to="/dashboard/users">User List</router-link>
            		 <router-link class="item" to="/dashboard/users/create">Create User</router-link>
            		<a class="item" href="#">Users Settings</a>
            	</div>
            </div>
            <div class="item">
            	<div class="header">Post Manager</div>
            	<div class="menu">
                <router-link class="item" to="/dashboard/posts">Posts List</router-link>
                <router-link class="item" to="/dashboard/posts/create">Create Post</router-link>
            	</div>
            </div>
            <div class="item">
                <div class="header">Category Manager</div>
                <div class="menu">
                    <router-link to="/dashboard/category" class="item">Create Category</router-link>
                </div>
            </div>
	</section>
</aside>
</template>

<script>
	export default {
		data(){
			return{
				user:{},
                url: window.url
			}
		},
		mounted(){
			this.user = window.User
		},
		computed: {
            userInfo() {
                return '/user/' + this.user.name
            }
        },
        methods: {
            Logout(){
                var vm = this
                axios.post('/logout').then(response => {
                    window.location.reload()
                })
            }
        }
	}
</script>