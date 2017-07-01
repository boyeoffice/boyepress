<template>
	<header class="main-header">
		<a href="#" class="logo"><span class="logo-lg">Boyepress</span></a>
		<nav class="navbar navbar-fixed-top">
			<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
      	<ul class="nav navbar-nav">
      		<li class="dropdown custom-menus">
      		<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
      	</li>
      	<li class="dropdown notifications-menu">
      		<a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
      	</li>
      	<li class="dropdown tasks-menu">
      		<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
      	</li>
      	<li class="dropdown user user-menu">
      		<a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img v-bind:src="url + '/' + user.avatar" class="user-image" alt="User Image">
              <span class="hidden-xs">{{user.name}}</span>
            </a>
            <ul class="dropdown-menu">
            <li class="user-header">
                <img v-bind:src="url + '/' + user.avatar" class="img-circle" alt="User Image">

                <p>
                  {{ user.name }} - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
            	<li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
      	</li>
      	</ul>
      </div>
		</nav>
	</header>
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
		}
	}
</script>