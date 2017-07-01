<template>
	<section>
		<section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <section class="content">
    	<div class="row">
    	<div class="col-md-3">
    		<div class="box box-danger">
    			<div class="box-header with-border">
    				<h3 class="box-title">Users</h3>
    				<div class="box-tools pull-right">
    					<span class="label label-danger">All</span>
    				</div>
    			</div>
    			<div class="box-body no-padding">
    			<ul class="stats-list clearfix">
    				<li><h1><i class="ion ion-ios-people"></i></h1></li>
    				<li><h1>{{ model.users }}</h1></li>
    			</ul>
    			</div>
    		</div>
    	</div>
    	<div class="col-md-3">
    		<div class="box box-danger">
    			<div class="box-header with-border">
    				<h3 class="box-title">View</h3>
    				<div class="box-tools pull-right">
    					<span class="label label-danger">All</span>
    				</div>
    			</div>
    			<div class="box-body no-padding">
    			<ul class="stats-list clearfix">
    				<li><h1><i class="ion ion-eye"></i></h1></li>
    				<li><h1>{{ model.visitor }}</h1></li>
    			</ul>
    			</div>
    		</div>
    	</div>
    	<div class="col-md-3">
    		<div class="box box-danger">
    			<div class="box-header with-border">
    				<h3 class="box-title">Posts</h3>
    				<div class="box-tools pull-right">
    					<span class="label label-danger">All</span>
    				</div>
    			</div>
    			<div class="box-body no-padding">
    			<ul class="stats-list clearfix">
    				<li><h1><i class="ion ion-ios-paper"></i></h1></li>
    				<li><h1>{{ model.posts }}</h1></li>
    			</ul>
    			</div>
    		</div>
    	</div>
    	<div class="col-md-3">
    		<div class="box box-danger">
    			<div class="box-header with-border">
    				<h3 class="box-title">Comments</h3>
    				<div class="box-tools pull-right">
    					<span class="label label-danger">All</span>
    				</div>
    			</div>
    			<div class="box-body no-padding">
    			<ul class="stats-list clearfix">
    				<li><h1><i class="ion ion-chatbubbles"></i></h1></li>
    				<li><h1>{{ model.comment }}</h1></li>
    			</ul>
    			</div>
    		</div>
    	</div>
    </div>
    </section>
	</section>
</template>
<script>
	export default {
		data(){
			return{
				model: []
			}
		},
		mounted(){
			axios.get('/api/statistics').then(response => {
				 this.model = response.data
			})
		}
	}
</script>