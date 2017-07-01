<template>
	<section>
		<section class="content-header">
      <h1>
        Categories
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Categories</li>
      </ol>
    </section>
    <section class="content">
         <div class="col-md-4">
         	<div class="box box-danger">
         		<div class="box-header with-border">
         			Add Category
         		</div>
         		<div class="box-body">
         			<form @submit.prevent="save">
         				<div class="form-group">
         				<label>Title</label>
         					<input type="text" 
         					v-model="form.title"
         					v-validate="'required|min:3'" 
         					name="title" 
         					class="form-control">
         					<div class="help-block alert alert-danger" 
         					v-show="errors.has('title')">
         						{{ errors.first('title')}}
         					</div>
         				</div>
         				<div class="form-group">
         					<label>Description</label>
         						<textarea class="form-control" 
         						v-model="form.description" 
         						v-validate="'required|max:100'" 
         						name="descritpion"></textarea>
         					   <div class="help-block alert alert-danger" 
         					   v-show="errors.has('description')">
         					   	{{ errors.first('description') }}
         					   </div>
         				</div>
         				<div class="form-group">
         					<button class="btn btn-primary">Save</button>
         				</div>
         			</form>
         		</div>
         	</div>
         </div>
         <div class="col-md-8">
         	<div class="box box-danger">
         		<div class="box-header with-border">Categories</div>
         		<div class="box-body">
         			<table class="table table-striped">
         				<thead>
         					<tr>
         						<th v-for="top in thead">{{ top.label }}</th>
         					</tr>
         				</thead>
         				<tbody>
         					<cat-viewer v-for="cat in cats" 
         					@delete-cat="deleteCat"
         					@update-cat="fetchData"
         					v-bind:cat="cat">
         					</cat-viewer>
         				</tbody>
         			</table>
         		</div>
         	</div>
         </div>
    </section>
	</section>
</template>
<script>
	import Mix from './Mix.vue'
	import CatViewer from './CatViewer.vue'
	export default{
		mixins: [Mix],
		components: { CatViewer }
	}
</script>