<template>
<div class="wrapper">
<navbar></navbar>
<sidebar></sidebar>
<div class="content-wrapper">
	<router-view></router-view>
</div>
</div>
</template>

<script>
	import Navbar from './Navbar.vue'
	import Sidebar from './Sidebar.vue'
	export default {
		components: { Navbar, Sidebar }
	}
</script>