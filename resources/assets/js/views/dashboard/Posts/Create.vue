<template>
	<section>
		<section class="content-header">
	         <h1>
	        Create Post
	        <small>Control panel</small>
	      </h1>
	      <ol class="breadcrumb">
	        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	        <li class="active"> Create Post</li>
	      </ol>
    </section>
    <section class="content">
    <div class="col-md-8">
    	<div class="box box-danger">
    		<div class="box-body">
    			<form>
    			   <div class="form-group">
    				<input type="text" class="form-control" v-model="form.title" placeholder="Enter title here">
    				</div>
    				<div class="form-group">
    				   <textarea class="form-control" id="content" rows="25" name="content" v-model="form.content"></textarea>
    				</div>
    			</form>
    		</div>
    	</div>
    </div>
    <div class="col-md-4">
    	<div class="box box-danger">
    	   <div class="box-header with-border"><b>Publish</b></div>
    		<div class="box-body">
    		 <div class="form-group">
    		 	<span>Status:</span>  <b></b>
    		 </div>
    		 <div class="form-group">
    		 	<i class="ion ion-eye"></i> <span>Visibility:</span>
    		 </div>
    		 <div class="form-group">
    		   <i class="ion ion-calender"></i>	<span>Publish:</span>
    		 </div>
             <div class="form-group">
                 <button class="btn btn-primary" @click="publish">Publish</button>
             </div>
    		</div>
    	</div>
    </div>
    <div class="col-md-4">
    	<div class="box box-danger">
    		<div class="box-header">
            <ul class="nav nav-tabs">
                <li :class="{'active': tabCat1}" role="presentation"> <a href="javascript:void(0)" @click="cancelCreate">Categories</a></li>
                <li :class="{'active': tabCat2}" role="presentation"><a href="javascript:void(0)" @click="createNew">Create</a></li>
            </ul>
           </div>
    		<div class="box-body">
    			<div class="form-group" v-if="tabCat1" v-for="cat in cats" :cat="cat">
                   <input type="radio" :id="cat.id" :value="cat.id" v-model="form.category_id">
    				<label>{{ cat.title }}</label>
    			</div>
                <div v-if="tabCat2">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" v-model="cat.title">
                </div>
                <div class="form-group">
                    <button @click="createCategory" class="btn btn-primary">Create</button>
                </div>
                </div>
    		</div>
    	</div>
    </div>
    <div class="col-md-4 pull-right">
    	<div class="box box-danger">
    		<div class="box-header with-border"><b>Tags</b></div>
            <div class="box-body">
                <div class="form-group">
                    <input-tag :on-change="callbackMethod" :tags="tagsArray"></input-tag>
                    <div class="help-block">Enter tags and press enter</div>
                </div>
            </div>
    	</div>
    </div>
    <div class="col-md-4 pull-right">
        <div class="box box-danger">
            <div class="box-header with-border">
                <b>Featured Image</b>
            </div>
            <div class="box-body">
                <a @click="featuredImg" v-if="imgUpload" href="javascript:void(0)"><u>Set featured image</u></a>
                        <div  v-if="!imgUpload">
                        <div class="form-group">
                        <div v-if="imgLoad" class="shot-preview"></div>
                        <img v-if="imgLd" :src="form.image" class="img img-responsive" height="150" width="100%">
                        </div>
                         <div class="form-group">
                           <input type="file" v-on:change="onFileChange">
                        </div>
                        </div>
            </div>
        </div>
    </div>
    </section>
	</section>
</template>

<script>
import FormMix from './FormMix.vue'
    export default {
        mixins: [FormMix],
        data(){
            return{
                tabCat1: true,
                tabCat2: false,
                cat: {
                    title: ''
                }
            }
        },
        methods: {
            createNew(){
                this.tabCat1 = false
                this.tabCat2 = true
            },
            cancelCreate(){
                this.tabCat2 = false
                this.tabCat1 = true
            },
            createCategory(){
                var vm = this
                axios.post('/api/cat', this.cat).then(response => {
                vm.cats.push(response.data.cat)
                vm.cat.title = ''
                this.tabCat1 = true
                })
            }
        }
    }
</script>