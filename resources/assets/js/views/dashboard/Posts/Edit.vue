<template>
	<section>
		<section class="content-header">
	         <h1>
	        Edit Post
	        <small>Control panel</small>
	      </h1>
	      <ol class="breadcrumb">
	        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	        <li class="active"> Edit Post</li>
	      </ol>
    </section>
    <section class="content">
    	<div class="box box-danger">
    		<form>
    			<div class="form-group">
    				<input type="text" v-model="post.title" class="form-control">
    			</div>
    			<div class="form-group">
    				<input type="text" v-model="post.content">
    			</div>
    		</form>
    	</div>
    </section>
	</section>
</template>

<script>
	export default {
		data(){
			return{
				post: []
			}
		},
		mounted(){
			this.fetchData()
		},
		methods: {
			fetchData(){
				axios.patch('/api/post/' + this.$route.params.id + '/edit')
				.then(response => {
					this.post = response.data
				})
			}
		}
	}
</script>